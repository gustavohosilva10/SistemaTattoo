<?php

namespace TattooOpen\Http\Controllers\Admin;

use Illuminate\Support\Carbon;
use TattooOpen\Http\Controllers\Controller;
use TattooOpen\Session;
use TattooOpen\Contact;

class DashboardController extends Controller
{
    protected $session;
    protected $contact;

    public function __construct(Session $session, Contact $contact)
    {
        $this->session = $session;
        $this->contact = $contact;
    }

    public function index()
    {
        $startWeek = Carbon::now()->startOfWeek()->toDateString();
        $endWeek = Carbon::now()->endOfWeek()->toDateString();

        $sessionDay = $this->session->whereDate('date', Carbon::today()->toDateString())
            ->orderBy('date', 'asc')
            ->get();

        $sessionWeek = $this->session->whereBetween('date', [$startWeek, $endWeek])
            ->orderBy('date', 'asc')
            ->get();

        $birthdayToDay = $this->contact->whereMonth('birthday', Carbon::today()->format('m'))
            ->whereDay('birthday', Carbon::today()->format('d'))
            ->get();

        $birthdayToWeek = $this->contact->whereMonth('birthday', Carbon::today()->format('m'))
            ->orderByRaw('EXTRACT(day FROM birthday) ASC')
            ->get();

        $data = collect([
            'sessionDay' => $this->getContactsFilter($sessionDay),
            'sessionWeek' => $this->getContactsFilter($sessionWeek),
            'birthdayToDay' => $this->getBirthdayFilter($birthdayToDay),
            'birthdayToWeek' => $this->getBirthdayFilter($birthdayToWeek),
        ]);
        return view('admin.dashboard.panel')->with('data', $data);
    }

    private function getContactsFilter($value)
    {
        if ($value->isEmpty())
            return null;

        foreach ($value as $session) :
            $data[] = $session->contact;
        endforeach;

        return $data;
    }

    private function getBirthdayFilter($value)
    {
        if ($value->isEmpty())
            return null;

        foreach ($value as $birthdayContact) :
            $data[] = $birthdayContact;
        endforeach;

        return $data;
    }
}
