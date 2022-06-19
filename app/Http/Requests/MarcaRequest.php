<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarcaRequest extends FormRequest
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
            'nm_marca'=>['required', 'max:255'/* , 'unique:marcas' Movida para o controller de marcas */],
            'ck_categoria_marca'=>['required'],
            'ds_marca'=>['max:350'],
            'id_empresa'=>['required'],
        ];
    }
    
    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nm_marca.required'=>'Campo do nome é obrigatório.',
            'nm_marca.max'=>'Tamanho máximo para o nome é de 255 caracteres',
            'nm_marca.unique'=>'Já existe uma marca com este nome',
            'ck_categoria_marca.required'=>'Selecione um categoria.',
            'ds_marca.max'=>'Tamanho máximo para a descrição é de 350 caracteres.',
            'id_empresa.required'=>'Escolha uma de suas filiais.',
        ];
    }

}
