<?php

namespace TattooOpen\Http\Controllers\Admin;

use Illuminate\Http\Request;
use TattooOpen\Http\Controllers\Controller;
use TattooOpen\Pageprincipals;
use Laracasts\Flash\Flash;
use Redirect;
class PageprincipalsController extends Controller

{
    
    protected $pageprincipal;

    public function index()
    {   
       
        return view('admin.pageprincipal.index');
        
    }

    public function create()
    { 
        
        return view('admin.pageprincipal.index')
        ->with('pageprincipal', $this->pageprincipal);
    }
    public function store(Request $request)
    {
        $pageprincipal = Pageprincipals::create($request->all());
        if($pageprincipal)
        \Session::flash('mensagem_sucesso','Sua landing page foi atualizada com sucesso.');
        else
            \Session::flash('mensagem_erro','Houve erros ao processar sua solicitação.');

        return Redirect::to('/sistema/painel');

    }


    public function destroy($id)
    {
        $pageprincipal = Pageprincipals::find($id);
        return response()->json([ 'pageprincipal' => $pageprincipal->delete() ]);
    }
}
