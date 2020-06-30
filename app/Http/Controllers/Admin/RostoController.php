<?php

namespace TattooOpen\Http\Controllers\Admin;

use Illuminate\Support\Carbon;
use TattooOpen\Http\Controllers\Controller;
use TattooOpen\Session;
use TattooOpen\Contact;

class RostoController extends Controller{

    public function index(){
        return view('admin.front.rosto');
    }
}
     