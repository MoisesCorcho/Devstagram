<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        // Obtener el valor del campo 'username' del request
        $username = $this->input('username');

        // Convertir el valor a slug
        $slug = Str::slug($username);

        // Actualizar el valor del campo 'username' en el request con el slug
        $this->merge([
            'username' => $slug,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:30'],
            'username' => ['required', 'min:3' ,'max:30', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email', 'max:60'],
            'password' => ['required', 'confirmed', 'min:8'],
        ];
    }
}
