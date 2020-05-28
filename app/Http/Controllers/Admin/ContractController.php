<?php

namespace TattooOpen\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use TattooOpen\Contract;
use TattooOpen\Http\Controllers\Controller;

class ContractController extends Controller
{
    private $contract;

    public function __construct(Contract $contract)
    {
        $this->contract = $contract;
    }

    public function ContractCreate()
    {
        $contract = $this->contract;  
        return view('admin.contacts.contract');
    }

}
