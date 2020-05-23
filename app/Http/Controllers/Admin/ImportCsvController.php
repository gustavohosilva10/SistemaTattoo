<?php

namespace TattooOpen\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use TattooOpen\Contact;
use TattooOpen\Http\Controllers\Controller;
use TattooOpen\Http\Requests\CsvImportRequest;

class ImportCsvController extends Controller
{
    private $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function file()
    {
        return view('admin.contacts.file');
    }

    public function parseCsv(CsvImportRequest $request)
    {
        // Prepare csv file
        $path = $request->file('csv_file')->getRealPath();
        $data = array_map('str_getcsv', file($path));

        array_walk($data, function (&$a) use ($data) {
            $a = array_combine($data[0], $a);
            $a = array_filter($a);
        });
        array_shift($data);

        // Insert Database
        if ($data) :
            foreach ($data as $row) :
                $this->contact->create($row);
            endforeach;
            Flash::success('<i class="fas fa-check-circle"></i> Seus Contatos foram importados corretamente!')->important();
            return redirect()->route('admin.contacts.index');
        endif;
    }
}
