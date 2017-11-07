<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MateriaFormRequest extends FormRequest
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
        return [
            'nome'      => 'required|min:2|max:100',
        'tipo'      => 'required',
        'descricao' => 'required|min:2|max:300',
        'qtd'       => 'required|numeric',
        'custo'     => 'required|numeric',
        ];
    }
    
    public function messages() {
        return [
            'nome.required'     => 'O campo nome é de preenchimento obrigatório.',
            'nome.min'          => 'É necessario que o nome tenha mais de 2 caracteres.',
            'descricao.min'     => 'É necessario que a descricao tenha mais de 2 caracteres.',
            'descricao.required'=> 'O campo descrição é de preenchimento obrigatório.',
            'custo.required'    => 'O campo custo é de preenchimento obrigatório.',
            'qtd.required'      => 'O campo quantidade é de preenchimento obrigatório.',            
        ];
    }
}
