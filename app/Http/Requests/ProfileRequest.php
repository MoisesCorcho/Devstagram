<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'username' => [
                    'required',
                    'min:3',
                    'max:20',
                    'unique:users,username,' . auth()->user()->id,
                    'not_in:editar-perfil'
                ],
            'image' => 'image',
        ];
    }
}
