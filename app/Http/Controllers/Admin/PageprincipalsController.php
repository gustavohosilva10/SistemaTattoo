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

        // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;

        if(isset($request->base64_image)){

            foreach ($request->base64_image as $key => $image) {
                // Verifica se informou o arquivo e se é válido
                if ($image->isValid()) {
                    // Define um aleatório para o arquivo baseado no timestamps atual
                    $name = uniqid(date('HisYmd'));
                    // Recupera a extensão do arquivo
                    $extension = $image->extension();
                    // Define finalmente o nome
                    $nameFile = "{$name}.{$extension}";
                    // Faz o upload:
                    $upload = $image->storeAs('gallery', $nameFile);
                    

                    // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
                    // Verifica se NÃO deu certo o upload (Redireciona de volta)
                    if ( !$upload ){
                        return "deu certo!";
                    }
                }
                $pageprincipal = Pageprincipals::create($request->all());
                if($pageprincipal)
                    \Session::flash('mensagem_sucesso','Sua landing page foi atualizada com sucesso.');
                else
                    \Session::flash('mensagem_erro','Houve erros ao processar sua solicitação.');
        
                return Redirect::to('/sistema/painel');

            }

        }



        /*
        $pageprincipal = Pageprincipals::create($request->all());
        if($pageprincipal)
            \Session::flash('mensagem_sucesso','Sua landing page foi atualizada com sucesso.');
        else
            \Session::flash('mensagem_erro','Houve erros ao processar sua solicitação.');

        return Redirect::to('/sistema/painel');
        */
    }


    public function destroy($id)
    {
        $pageprincipal = Pageprincipals::find($id);
        return response()->json([ 'pageprincipal' => $pageprincipal->delete() ]);
    }
}
