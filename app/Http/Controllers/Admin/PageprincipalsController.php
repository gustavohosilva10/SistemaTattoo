<?php
namespace TattooOpen\Http\Controllers\Admin;
use TattooOpen\Http\Controllers\Controller;

use TattooOpen\Pageprincipals;

class PageprincipalsController extends Controller
{
   
    public function Pageprincipal(){
        
        return view('admin.contacts.pageprincipal');
    }
}
     