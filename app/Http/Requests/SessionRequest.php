<?php

namespace TattooOpen\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionRequest extends FormRequest
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
            'date' => 'required',
            'time' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'O campo ID é obrigatório!',
            'id.numeric' => 'O campo ID tem de ser número!',
            'date.required' => 'O campo Data é obrigatório!'
        ];
    }
}
