<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'description' => 'nullable|string|max:2000',
            'phone_number' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:100',
            'twitter' => 'nullable|string|max:100',
        ];
    }
}
