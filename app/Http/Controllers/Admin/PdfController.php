<?php
namespace TattooOpen\Http\Controllers\Admin;

use PDF;
use TattooOpen\Contact;
use TattooOpen\Contract;
use TattooOpen\Http\Controllers\Controller;

class PdfController extends Controller
{
    public function geraPdf($id_contact)
    {
        $contract = Contract::first();
        $contact = Contact::findOrFail($id_contact);
        $pdf = PDF::loadView('/admin/pdf', compact('contract', $contract, 'contact', $contact));

        return $pdf->setPaper('a4')->stream('Contrato');
    }
}
