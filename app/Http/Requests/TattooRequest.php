<?php

namespace TattooOpen\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TattooRequest extends FormRequest
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
            'id' => 'required|numeric',
            'name' => 'required|string',
            'status' => 'required',
            'date' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'O campo ID é obrigatório!',
            'id.numeric' => 'O campo ID tem de ser número!',
            'name.required' => 'O campo Nome é obrigatório!',
            'name.string' => 'O campo Nome tem de ser um texto!',
            'status.required' => 'O campo Andamento é obrigatório!',
            'date.required' => 'O campo Data é obrigatório!'
        ];
    }
}
