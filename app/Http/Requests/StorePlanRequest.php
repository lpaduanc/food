<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlanRequest extends FormRequest
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
            'name' => [
                'required',
                'min:3',
                'max:255',
                "unique:plans,name,{$this->segment(3)},url"
                // único na tabela planos quando a url no segmento 3(parte da url) é diferente da url atual
            ],
            'description' => [
                'nullable',
                'min:3',
                'max:255'
            ],
            'price' => [
                'required',
                "regex:/^\d+(\,\d{1,2})?$/"
            ]
        ];
    }
}
