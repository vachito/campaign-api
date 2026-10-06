<?php

namespace App\Services;

use App\Models\Campaign;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CampaignService
{
    public function all()
    {
        return Campaign::with(['bucket', 'template_meta'])->get();
    }

    public function create(array $data): Campaign
    {
        return DB::transaction(function () use ($data) {
            $data['uuid'] = (string)Str::uuid();
            return Campaign::create($data);
        });
    }

    public function update(Campaign $campaign, array $data): Campaign
    {
        return DB::transaction(function () use ($campaign, $data) {
            $campaign->update($data);
            return $campaign;
        });
    }

    public function delete(Campaign $campaign):bool
    {
        return DB::transaction(function () use ($campaign) {
            return $campaign->delete();
        });
    }
}
