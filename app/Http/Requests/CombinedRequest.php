<?php

namespace TattooOpen\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use TattooOpen\Http\Requests\AnamnesiRequest;
use TattooOpen\Http\Requests\ContactRequest;

class CombinedRequest extends FormRequest
{

    protected $contact;
    protected $anamnesi;

    public function __construct(ContactRequest $contact, AnamnesiRequest $anamnesi)
    {
        $this->contact = $contact;
        $this->anamnesi = $anamnesi;
    }

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
        return array_merge(
            $this->contact->rules(),
            $this->anamnesi->rules()
        );
    }

    public function messages()
    {
        return array_merge(
            $this->contact->messages(),
            $this->anamnesi->messages()
        );
    }
}
