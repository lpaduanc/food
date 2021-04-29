<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePlanoRequest extends FormRequest
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
            'nome' => [
                'required',
                'min:3',
                'max:255',
                "unique:planos,nome,{$this->segment(3)},url"
                // único na tabela planos quando a url no segmento 3(parte da url) é diferente da url atual
            ],
            'descricao' => [
                'nullable',
                'min:3',
                'max:255'
            ],
            'preco' => [
                'required',
                "regex:/^\d+(\,\d{1,2})?$/"
            ]
        ];
    }
}
