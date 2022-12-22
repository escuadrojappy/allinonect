<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;

class CreateVisitorByQrCodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::authorize('is_admin', $this->instance());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'qrcode_result' => ['required', 'json'],
            'result' => ['array'],
            'result.DateIssued' => ['string'],
            'result.Issuer' => ['string'],
            'result.alg' => ['string'],
            'result.signature' => ['string'],
            'result.subject.*' => ['sometimes'],
            'result.subject.PCN' => ['unique:App\Models\Visitor,philsys_card_number'],
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

        $this->merge([
            'result' => $qrCode,
        ]);
    }
}
