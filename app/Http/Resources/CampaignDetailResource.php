<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CampaignDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        
        $mensajesEntregados = $this->metrics
            ->firstWhere('status_message.name', 'Mensajes enviados')
            ?->quantity ?? 0;
        $total = number_format($mensajesEntregados*$this->template_meta->unit_price,2);

        return [
            'id' => $this->id,
            'bucket' => $this->bucket->organizational_unit,
            'name' => $this->name,
            'dispatch_date' => $this->dispatch_date ? Carbon::parse($this->dispatch_date)->format('d-m-Y') : null,
            'template_meta' => $this->template_meta->category,
            'dispatch_template' => $this->dispatch_template,
            'unit_price' => $this->template_meta->unit_price,
            'total_db' => $this->total_db,
            'total_spend' => $total,
            'metrics' => CampaignMetricsDetailResource::collection($this->metrics)
        ];
    }
}
