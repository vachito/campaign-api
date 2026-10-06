<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class CampaignsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'name' => $this->name,
            'dispatch_date' => $this->dispatch_date ? Carbon::parse($this->dispatch_date)->format('d-m-Y') : null,
            'bucket' => $this->bucket->organizational_unit,
            'template_meta' => $this->template_meta->category,
            'total_db' => $this->total_db,
            'unit_price' => $this->template_meta->unit_price,
        ];
    }
}
