<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'tagline' => ['required', 'string', 'max:255'],
            'thumbnail' => ['sometimes', 'image', 'mimes:png,jpg,jpeg', 'max:10120'],
            'about' => ['required', 'string', 'max:65535'],
            'images.*' => ['sometimes', 'image', 'mimes:png,jpg,jpeg', 'max:10120'],
            'images' => ['sometimes', 'array', 'max:10'], // Limit to 10 images per upload
        ];
    }
}
