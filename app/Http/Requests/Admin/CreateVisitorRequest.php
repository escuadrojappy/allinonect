<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class CreateVisitorRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date'],
            'place_of_birth' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'numeric', 'digits:11'],
            'philsys_card_number' => ['required', 'string', 'max:255', 'unique:App\Models\Visitor,philsys_card_number'],
            'email' => ['required', 'email', 'max:255', 'unique:App\Models\User,email'],
        ];
    }
}
