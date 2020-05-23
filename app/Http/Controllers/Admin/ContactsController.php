<?php

namespace TattooOpen\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use TattooOpen\Http\Controllers\Controller;
use TattooOpen\Http\Requests\CombinedRequest;
use TattooOpen\Http\Requests\SessionRequest;
use TattooOpen\Http\Requests\TattooRequest;
use TattooOpen\Contact;
use TattooOpen\Session;
use TattooOpen\Tattoo;

class ContactsController extends Controller
{
    protected $contact;
    protected $tattoo;
    protected $session;

    public function __construct(Contact $contact, Tattoo $tattoo, Session $session)
    {
        $this->contact = $contact;
        $this->tattoo = $tattoo;
        $this->session = $session;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = $this->contact->orderBy('id', 'desc')->paginate(50);
        return view('admin.contacts.index')->with('contacts', $contact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact = null;
        return view('admin.contacts.create')->with('contact', $contact);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CombinedRequest $request)
    {
        $data = $request->except(['anamnesis']);

        if ($request->hasFile('avatar')) :
            $data['avatar'] = $this->avatarImage($request);
        endif;

        $contact = $this->contact->create($data);
        $anamnesis = $request->only(['anamnesis']);

        foreach ($anamnesis['anamnesis'] as $input => $value) :
            $merge = array_merge($anamnesis['anamnesis'][$input], ['type' => $input]);
            $contact->anamnesis()->create($merge);
        endforeach;

        Flash::success('<i class="fas fa-check-circle"></i> O Contato <strong><i>' . $contact->present()->getFullName . '</strong></i> foi criado corretamente!')->important();
        return redirect()->route('admin.contacts.show', $contact->id);
    }

    public function storeTattoo(TattooRequest $request)
    {
        $contact = $this->contact->findOrFail($request->input(['id']));
        $contact->tattoos()->create($request->except(['id', '_token']));

        Flash::success('<i class="fas fa-check-circle"></i> A Tatuagem <strong><i>' . $request->input(['name']) . '</strong></i> foi adicionada corretamente!')->important();
        return redirect()->route('admin.contacts.show', $request->input(['id']));
    }

    public function storeSession(SessionRequest $request)
    {
        $data = $request->except(['id', '_token']);
        $date = explode('/', $data['date']);
        $data['date'] = $date[2] . '-' . $date[1] . '-' . $date[0] . ' ' . $data['time'] . ':00';
        $remove = array_pop($data);

        $contact = $this->contact->findOrFail($request->input(['id']));
        $contact->sessions()->create($data);

        Flash::success('<i class="fas fa-check-circle"></i> A Sessão foi adicionada corretamente!')->important();
        return redirect()->route('admin.contacts.show', $request->input(['id']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = $this->contact->findOrFail($id);
        return view('admin.contacts.show')->with('contact', $contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = $this->contact->findOrFail($id);
        return view('admin.contacts.edit')->with('contact', $contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CombinedRequest $request, $id)
    {
        $contact = $this->contact->findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('avatar')) :
            $data['avatar'] = $this->avatarImage($request);
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

        Flash::success('<i class="fas fa-check-circle"></i> O Contato <strong><i>' . $contact->present()->getFullName . '</strong></i> foi alterado corretamente!')->important();
        return redirect()->route('admin.contacts.edit', $id);
    }

    public function updateTattoo(TattooRequest $request)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $contact = $this->contact->findOrFail($id);
        Flash::success('<i class="fas fa-check-circle"></i> O Contato <strong><i>' . $contact->present()->getFullName . '</strong></i> foi excluido corretamente!')->important();
        $contact->delete();
        return redirect()->route('admin.contacts.index', $request->all());
    }

    public function destroyTattoo(Request $request, $id)
    {
        $tattoo = $this->tattoo->findOrFail($id);
        Flash::success('<i class="fas fa-check-circle"></i> A Tatuagem <strong><i>' . $tattoo->name . '</strong></i> foi excluida corretamente!')->important();
        $tattoo->delete();
        return redirect()->route('admin.contacts.show', $request->all());
    }

    public function destroySession(Request $request, $id)
    {
        $session = $this->session->findOrFail($id);
        Flash::success('<i class="fas fa-check-circle"></i> A Sessão foi excluida corretamente!')->important();
        $session->delete();
        return redirect()->route('admin.contacts.show', $request->all());
    }

    private function avatarImage($data) {
        $birthday = str_replace('/', '-', $data->input('birthday'));
        $imageName  = strtolower($birthday . '-' . $data->input('first_name') . '-' . $data->input('last_name'));
        $imageName .= '.' . $data->avatar->getClientOriginalExtension();
        $data = $data->avatar->storeAs('avatars', $imageName);
        return $data;
    }
}
