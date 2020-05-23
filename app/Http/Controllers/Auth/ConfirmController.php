<?php

namespace TattooOpen\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use TattooOpen\Contact;
use TattooOpen\Http\Controllers\Controller;
use TattooOpen\Http\Requests\CombinedRequest;

class ConfirmController extends Controller
{
    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function confirm($id, $name)
    {
        $contact = $this->contact->findOrFail($id);

        $contact = [
            'id' => $id,
            'name' => $name,
            'fullname' => $contact->present()->getFullName()
        ];

        return view('frontend.confirm')->with('contact', $contact);
    }

    public function validation()
    {
        dd('Validate: Rota para Editar!');
    }

    public function edit(Request $request, $id, $name)
    {
        $contact = $this->contact->findOrFail($id);
        if ($contact->email === $request->input(['email'])) :
            $contact = $this->contact->findOrFail($id);
            return view('frontend.edit')->with('contact', $contact);
        endif;

        if ($request->input(['email'])) :
            Flash::error('<i class="fas fa-times-circle"></i> Desculpe! O e-mail <strong><i>' . $request->input(['email']) . '</strong></i> não está cadastrado! Tente algum outro e-mail.')->important();
        endif;

        return redirect()->route('client.confirm', [
            'id' => $id,
            'name' => $name
        ]);
    }

    public function update(CombinedRequest $request, $id)
    {
        $contact = $this->contact->findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('avatar')) :
            $birthday = str_replace('/', '-', $request->input('birthday'));
            $imageName  = strtolower($birthday . '-' . $request->input('first_name') . '-' . $request->input('last_name'));
            $imageName .= '.' . $request->avatar->getClientOriginalExtension();
            $data['avatar'] = $request->avatar->storeAs('avatars', $imageName);
        endif;

        $contact->update($data);

        $i = 0;
        foreach ($data['anamnesis'] as $input => $value) :
            $merge = array_merge($data['anamnesis'][$input], ['type' => $input]);
            if ($contact->anamnesis->count()) :
                $contact->anamnesis()->updateOrCreate(['id' => $contact->anamnesis[$i++]->id], $merge);
            else:
                $contact->anamnesis()->updateOrCreate($merge);
            endif;
        endforeach;

        return redirect()->route('client.thanks');
    }

    public function thanks()
    {
        return view('frontend.thanks');
    }
}
