<?php

namespace TattooOpen\Http\Controllers\Admin;

use TattooOpen\Bibliography;
use TattooOpen\Http\Controllers\Controller;
use TattooOpen\Photos;
use TattooOpen\Welcome;

class RostoController extends Controller
{

    public function index()
    {

        $welcome = Welcome::first();
        $bibliography = Bibliography::first();
        $photos = Photos::all();
        return view('admin.front.rosto', compact(['welcome', $welcome, 'bibliography', $bibliography, 'photos', $photos]));
    }
}
