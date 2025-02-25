<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'emailLogin' => 'required|email',
            'passwordLogin' => [
                'required',
                'string',
                'min:8',             // must be at least 8 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ]
        ];
    }
    public function messages()
    {
        return [
            'email.required' => "Email is a required field.",
            'password.required' => "Password is required field.",
            'password.min' => "Password needs to be at least 8 characters long.",
            'password.regex' => "Password must contain at least one lowercase letter, one uppercase letter, one digit and one special character."
        ];
    }
}
