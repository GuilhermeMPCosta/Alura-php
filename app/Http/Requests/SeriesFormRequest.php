<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => ['required', 'min:3', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O Nome é obrigatório',
            'nome.min' => 'O Nome deve ter pelo menos 3 caracteres',
            'nome.max' => 'O Nome deve ter no maximo 255 caracteres',
        ];
    }
}
