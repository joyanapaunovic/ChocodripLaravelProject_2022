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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstNameContact' => 'required|string|min:3|regex:/[A-Za-z]{2,}/',
            'lastNameContact' => 'required|string|min:3',
            'emailContact' => 'required|email',
            'message' => 'required|string|min:3'
        ];
    }
    public function messages()
    {
        return [
            'firstNameContact.required' => 'First name is a required field.',
            'lastNameContact.required' => 'Last name is a required field.',
            'emailContact.required' => 'Email is a required field.',
            'message.required' => 'Message is a required field.',
            'firstNameContact.min' => 'First name must be at least 3 characters long.',
            'lastNameContact.min' => 'Last name must be at least 3 characters long.',
            'message.min' => 'Message must be at least 3 characters long.'
        ];
    }
}
