<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(3);
        $nome = $this->nome;
        $whatssap = $this->whatssap;


        $rules = [
            'nome' => "required|string|max:100|"


        ];

        if ($this->method() == 'PUT') {
            $rules = [
                'nome' => [
                    'required',
                    Rule::unique('alunos', 'nome')->ignore($id),
                ]
            ];
        }

        return $rules;
    }
    public function messages()
    {
        return [
            'nome.unique' => 'Este nome já existe',

        ];
    }
}
