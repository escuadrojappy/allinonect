<?php

namespace App\Http\Requests\Auth;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::authorize('is_admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email', 'max:255', 'unique:App\Models\User,email'],
            'role_id' => ['required', 'numeric', 'in:2'],
            'name' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'contact_number' => ['required', 'numeric', 'digits:11'],
        ];
    }
}
