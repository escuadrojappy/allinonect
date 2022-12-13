<?php

namespace App\Http\Requests\Establishment;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class ScanEstablishmentVisitorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::authorize('is_establishment', $this->instance());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'establishment_id' => ['required', 'numeric', 'exists:App\Models\Establishment,id'],
            'qrcode_result' => ['required', 'json'],
        ];
    }
}
