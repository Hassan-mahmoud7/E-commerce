<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            // 'token' => ['required', 'exists:otps,token'],
            // 'email' => ['required', 'exists:otps,identifier'],
            'email' => ['required', 'email','max:100', 'exists:admins,email'],
            'password' => ['required', 'min:8', 'max:25', 'confirmed'],
            'password_confirmation' => ['required'],
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' =>  __('validation.error'),
            'email.max' =>  __('validation.error'),
            'email.email' =>  __('validation.error'),
            'email.exists' =>  __('validation.error'),

        ];
    }
}
