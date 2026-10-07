<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CampaignStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required | string',
            'dispatch_date' => 'required',
            'dispatch_template' => 'sometimes|required',
            'total_db' => 'required',
            'bucket_id' => 'required|exists:buckets,id',
            'template_meta_id' => 'required|exists:template_metas,id',
            'metrics' => 'required|array',
            'metrics.*.status_message_id' => 'required|exists:status_messages,id',
            'metrics.*.quantity' => 'numeric'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre de la campaña es obligatorio',
            'dispatch_date.required' => 'La fecha de envío es obligatoria',
            'total_db.required' => 'El valor de la base de datos total es obligatoria',
            'bucket_id.required' => 'Debe seleccionar un bolsón',
            'bucket_id.exists' => 'El bolsón seleccionado no esta registrado',
            'template_meta_id.required' => 'El ID de la meta de la plantilla es obligatorio',
            'template_meta_id.exists' => 'El ID de la meta de la plantilla no esta registrado',
            'metrics.*.status_message_id.required' => 'Debe seleccionar una métrica'
        ];
    }
}