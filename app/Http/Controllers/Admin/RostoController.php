<?php

namespace TattooOpen\Http\Controllers\Admin;

use TattooOpen\Http\Controllers\Controller;
use TattooOpen\Pageprincipals;
use TattooOpen\Session;

use Illuminate\Http\Request;

class RostoController extends Controller{

    public function index(){

        $pageprincipal  = new Pageprincipals;
        return view('admin.front.rosto')->with('pageprincipal', $pageprincipal);
    }
}
     