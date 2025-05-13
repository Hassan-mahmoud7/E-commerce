<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'site_name.*' => ['required', 'string','max:255'],
            'small_desc.*' => ['required', 'string','max:255'],
            'address.*' => ['required', 'string','max:255'],
            'meta_desc.*' => ['required', 'string','min:10','max:200'],

            'email' => ['required', 'email','max:255'],
            'email_support' => ['required', 'email','max:255'],
            'phone' => ['required', 'string','max:20'],
            'logo' => ['nullable','mimes:jpeg,png,jpg,gif,bmp,webp,svg,ico,tiff','max:2048'],
            'favicon' => ['nullable','mimes:jpeg,png,jpg,gif,bmp,webp,svg,ico,tiff','max:2048'],

            'facebook' => ['required', 'url','max:255'],
            'twitter' => ['required', 'url','max:255'],
            'instagram' => ['required', 'url','max:255'],
            'youtube' => ['required', 'url','max:255'],
            
            'site_copyright' => ['required', 'string','max:255'],
            'promotion_video_url' => ['nullable', 'url','max:255'],
        ];
    }
}
