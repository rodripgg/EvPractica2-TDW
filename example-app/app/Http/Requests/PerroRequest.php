<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PerroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'url_foto' => 'nullable|url',
            'descripcion' => 'required|string',
        ];
    }
}
