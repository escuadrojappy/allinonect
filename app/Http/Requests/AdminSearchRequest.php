<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class AdminSearchRequest extends FormRequest
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
            'page' => [
                'numeric',
                'min:1'
            ],
            'per_page' => [
                'required_with:page',
                'numeric',
                'min:5',
                'max:100'
            ],
            'order' => [
                'required',
                'array'
            ],
            'order.column' => [
                'required',
                'string'
            ],
            'order.dir' => [
                'required',
                'string'
            ],
            'search' => [
                'nullable',
                'string',
            ],
            'draw' => [
                'required',
                'min:1',
                'numeric',
            ],
        ];
    }
}
