<?php

namespace App\Services;

use App\Models\Campaign;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Metric;

class CampaignService
{
    public function all()
    {
        return Campaign::with(['bucket', 'template_meta'])->get();
    }

    public function create(array $data): Campaign
    {
        return DB::transaction(function () use ($data) {
            $campaign = [
                'uuid' => (string)Str::uuid(),
                'name' => $data['name'],
                'dispatch_date' => $data['dispatch_date'],
                'dispatch_template' => $data['dispatch_template'] ?? null,
                'total_db' => $data['total_db'],
                'bucket_id' => $data['bucket_id'],
                'template_meta_id' => $data['template_meta_id'],
            ];

            $Newcampaign = Campaign::create($campaign);

            foreach ($data['metrics'] as $metric) {
                if ((int)$metric['quantity'] > 0) {
                    $metrics[] = [
                        'campaign_id' => $Newcampaign->id,
                        'status_message_id' => $metric['status_message_id'],
                        'quantity' => $metric['quantity'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }

            Metric::insert($metrics);

            return $Newcampaign;
        });
    }

    public function find(Campaign $campaign){
        return $campaign->load(['template_meta','bucket','metrics.status_message']);      
    }

    public function update(Campaign $campaign, array $data): Campaign
    {
        return DB::transaction(function () use ($campaign, $data) {
            $campaignData = [
                'name' => $data['name'],
                'dispatch_template' => $data['dispatch_template'] ?? null,
            ];

            $campaign->update($campaignData);

            if(isset($data['metrics'])){
                foreach ($data['metrics'] as $metric) {
                    Metric::updateOrCreate(
                        [
                            'campaign_id' => $campaign->id,
                            'status_message_id' => $metric['status_message_id'],
                        ],
                        [
                            'quantity' => $metric['quantity'],
                        ]
                    );
                }
            }

            return $campaign->fresh();
        });
    }

    public function delete(Campaign $campaign): bool
    {
        return DB::transaction(function () use ($campaign) {
            return $campaign->delete();
        });
    }
}
