<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use CodeZero\UniqueTranslation\UniqueTranslationRule;

class BrandRequest extends FormRequest
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
        $rules = [
            'name.*' => ['required', 'string','min:1','max:100', UniqueTranslationRule::for('brands')->ignore($this->id)],
            'status' => ['required', 'in:1,0'],
        ];
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['logo'] = ['nullable', 'image','mimes:jpeg,png,jpg,svg,gif,webp,','max:2048'];
        }else{
            $rules['logo'] = ['required', 'image','mimes:jpeg,png,jpg,svg,gif,webp,','max:2048'];
        }
        return $rules;
    }
}
