<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPasswordResetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'password'      => 'required|string|min:8|max:30|regex: /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,52}$/',
        ];
    }

    public function messages(): array
    {
        return [
            'password.regex'   => 'Password must contain at least one uppercase letter, one lowercase letter, one digit, one special character (#?!@$%^&*-), and be between 8 and 52 characters in length.',
        ];
    }

    public function attributes(): array
    {
        return [
            'password'      => 'Password',
        ];
    }
}
