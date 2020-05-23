<?php

namespace TattooOpen\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use TattooOpen\Contact;
use TattooOpen\Http\Controllers\Controller;

class AutoCompleteController extends Controller
{
    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function index(Request $request)
    {
        $contact = $this->contact->findOrFail($request->input(['search']));
        return view('admin.contacts.show')->with('contact', $contact);
    }

    public function search(Request $request)
    {
        $term = strtolower($request->term);
        $queries = $this->contact->where('first_name', 'ILIKE', '%' . $term . '%')
            ->take(15)
            ->get();

        foreach ($queries as $key => $data) :
            $results[$key] = ['id' => $data->id, 'value' => $data->present()->getFullName];
        endforeach;

        if (empty($results)) :
            $results[0] = 'Nenhum Resultado!';
        endif;

        return response()->json($results);
    }
}
