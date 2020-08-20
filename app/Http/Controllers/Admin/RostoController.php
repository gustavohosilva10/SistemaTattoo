<?php

namespace TattooOpen\Http\Controllers\Admin;

use TattooOpen\bibliography;
use TattooOpen\Http\Controllers\Controller;
use TattooOpen\Photos;
use TattooOpen\posts;
use TattooOpen\Welcome;

class RostoController extends Controller
{

    public function index()
    {

        $welcome = Welcome::first();
        $bibliography = bibliography::first();
        $photos = Photos::all();
        $posts = posts::all();
        return view('admin.front.rosto', compact(['welcome', $welcome, 'bibliography', $bibliography, 'photos', $photos, 'posts', $posts]));
    }
}
