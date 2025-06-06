<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewUpdateRequest extends FormRequest
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
           'nota' => 'sometimes|numeric|max:5',
            'texto' => 'sometimes|string|min:0',
            'usuario_id' => 'sometimes|exists:usuarios,id',
            'livro_id' => 'sometimes|exists:livros,id',
        ];
    }
}
