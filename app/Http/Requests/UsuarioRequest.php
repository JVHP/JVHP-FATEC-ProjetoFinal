<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'nm_usuario'=>['required', 'max:255'],
            'email'=>['required', 'email', 'max:255', 'unique:users'],
            /* 'emailC'=>['required','unique:users,email', 'email' ], */
            'dt_nasc'=>'required',
            'cep'=>['required', 'max:8', 'min:8'],
            'cd_password'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'nm_usuario.required'=>'Nome é obrigatório',
            'nm_usuario.max'=>'Nome do usuário deve ter no máximo 255 caracteres ',
            'email.required'=>'E-Mail é obrigatório',
            'email.unique'=>'E-Mail já cadastrado',
            'email.email'=>'Insira um e-mail com formato válido',
            'email.max'=>'Email deve ter no máximo 255 caracteres ',
            'dt_nasc.required'=>'Data de nascimento é obrigatória',
            'cep.required'=>'CEP é obrigatório',
            'cep.max'=>'Limite de 8 caracteres',
            'cep.min'=>'CEP deve ter 8 caracteres',
            'cd_password.required'=>'Senha é obrigatória',
        ];
    }
}
