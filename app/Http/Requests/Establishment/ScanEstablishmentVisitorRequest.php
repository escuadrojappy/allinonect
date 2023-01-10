<?php

namespace App\Http\Requests\Establishment;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Arr;

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

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $qrCode = json_decode($this->qrcode_result, true);

        if (!Arr::has($qrCode, 'subject.PCN')) throw ValidationException::withMessages([
            'qrcode_result' => 'Invalid QR Code.'
        ]);
    }
}
