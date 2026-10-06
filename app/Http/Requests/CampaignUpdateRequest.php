<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CampaignUpdateRequest extends FormRequest
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
            'name' => 'sometimes|required | string',
            'dispatch_date' => 'sometimes|required',
            'dispatch_template' => 'sometimes|required',
            'total_db' => 'sometimes|required',
            'bucket_id' => 'sometimes|required|exists:buckets,id',
            'template_meta_id' => 'sometimes|required|exists:template_metas,id',
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
        ];
    }
}
