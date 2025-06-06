<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroUpdateRequest extends FormRequest
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
            'titulo' => 'sometimes|string|max:255',
            'sinopse' => 'sometimes|string|min:0',
            'autor_id' => 'sometimes|exists:autores,id',
            'genero_id' => 'sometimes|exists:generos,id',
        ];
    }
}
