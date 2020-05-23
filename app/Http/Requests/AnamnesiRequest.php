<?php

namespace TattooOpen\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnamnesiRequest extends FormRequest
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
            'anamnesis.blood.description' => 'required',
            'anamnesis.allergy.description' => 'required_if:allergy.health,1',
            'anamnesis.skin.description' => 'required_if:skin.health,1',
            'anamnesis.hepatitis.description' => 'required_if:hepatitis.health,1',
            'anamnesis.epilepsy.description' => 'required_if:epilepsy.health,1',
            'anamnesis.dst.description' => 'required_if:dst.health,1',
            'anamnesis.cardiac.description' => 'required_if:cardiac.health,1',
            'anamnesis.remedy.description' => 'required_if:remedy.health,1',
            'anamnesis.drugs.description' => 'required_if:drugs.health,1',

            'anamnesis.allergy.health' => 'required|boolean',
            'anamnesis.skin.health' => 'required|boolean',
            'anamnesis.hepatitis.health' => 'required|boolean',
            'anamnesis.epilepsy.health' => 'required|boolean',
            'anamnesis.dst.health' => 'required|boolean',
            'anamnesis.cardiac.health' => 'required|boolean',
            'anamnesis.remedy.health' => 'required|boolean',
            'anamnesis.drugs.health' => 'required|boolean',
            'anamnesis.pregnant.health' => 'required|boolean',
            'anamnesis.feed.health' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'anamnesis.blood.description.required' => 'O campo Tipo Sanguíneo é obrigatório!',
            'anamnesis.allergy.description.required_if' => 'O campo Quais Alergias é obrigatório!',
            'anamnesis.skin.description.required_if' => 'O campo Quais Problemas é obrigatório!',
            'anamnesis.hepatitis.description.required_if' => 'O campo Quais é obrigatório!',
            'anamnesis.epilepsy.description.required_if' => 'O campo Tipos de Crises é obrigatório!',
            'anamnesis.dst.description.required_if' => 'O campo Quais é obrigatório!',
            'anamnesis.cardiac.description.required_if' => 'O campo Quais é obrigatório!',
            'anamnesis.remedy.description.required_if' => 'O campo Quais é obrigatório!',
            'anamnesis.drugs.description.required_if' => 'O campo Quais é obrigatório!',

            'anamnesis.allergy.health.required' => 'O campo Sofre alguma alergia é obrigatório!',
            'anamnesis.skin.health.required' => 'O campo Problema Dermatológico é obrigatório!',
            'anamnesis.hepatitis.health.required' => 'O campo Portador de Hepatites é obrigatório!',
            'anamnesis.epilepsy.health.required' => 'O campo Possuí Epilepsia é obrigatório!',
            'anamnesis.dst.health.required' => 'O campo Possuí alguma DST é obrigatório!',
            'anamnesis.cardiac.health.required' => 'O campo Cardíaco / Circulatório é obrigatório!',
            'anamnesis.remedy.health.required' => 'O campo Usa algum Medicamento é obrigatório!',
            'anamnesis.drugs.health.required' => 'O campo Fez / faz uso de drogas é obrigatório!',
            'anamnesis.pregnant.health.required' => 'O campo É Gestante é obrigatório!',
            'anamnesis.feed.health.required' => 'O Se Alimentou / Hidratou bem é obrigatório!',
        ];
    }
}
