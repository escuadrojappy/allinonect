<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class CreateVisitorHealthStatusRequest extends FormRequest
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
            'covid_result' => ['required', 'boolean'],
            'remarks' => ['required', 'string', 'max:1000'],
            'date_result' => ['required', 'date'],
            'visitor_id' => ['required', 'numeric', 'exists:App\Models\Visitor,id'],
        ];
    }
}
