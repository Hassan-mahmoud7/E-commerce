<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
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
            'name' => ['required','string','min:2','max:60'],
            'email' => ['required','email','max:100', Rule::unique('admins','email')->ignore($this->id)],
            'password' => ['required','min:8','max:25','confirmed'],
            'password_confirmation' => ['required'],
            'status' => ['in:true,false,off,on'],
            'role_id' => ['required','exists:roles,id'],
        ];
    }
}
