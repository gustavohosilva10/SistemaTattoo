<?php

namespace TattooOpen\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'avatar' => 'image|max:1000',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'birthday' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'agree' => 'required|accepted',
        ];
    }

    public function messages()
    {
        return [
            'avatar.image' => 'Envie uma imagem válida!',
            'avatar.max' => 'A imagem tem de ser menor de 1Mb!',
            'first_name.required' => 'O campo Primeiro Nome é obrigatório!',
            'first_name.string' => 'O campo Primeiro Nome tem de ser um texto!',
            'last_name.required' => 'O campo Último Nome é obrigatório!',
            'last_name.string' => 'O campo Último Nome tem de ser um texto!',
            'birthday.required' => 'O campo Data de nascimento é obrigatório!',
            'gender.required' => 'O campo Sexo é obrigatório!',
            'email.required' => 'O campo Email é obrigatório!',
            'email.email' => 'Digite um Email válido!',
            'agree' => 'Aceite o termo de responsabilidade!',
        ];
    }
}
