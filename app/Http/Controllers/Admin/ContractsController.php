<?php

namespace TattooOpen\Http\Controllers\Admin;

use Illuminate\Http\Request;
use TattooOpen\Http\Controllers\Controller;
use TattooOpen\Contract;
use Laracasts\Flash\Flash;
use Redirect, DataTables;

class ContractsController extends Controller
{
    
    protected $contract;

    public function __construct(){

        $this->contract = Contract::first();

    }

    public function index()
    {   
        $contract = Contract::first();
       
        return view('admin.contracts.index')->with('contract', $contract);
        
    }

    public function create()
    { 
        
        return view('admin.contracts.contract')
        ->with('contract', $this->contract);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'text_contract' => 'required |unique',
            
        ]);
        
        $contract = Contract::create($request->all());
        if($contract)
        \Session::flash('mensagem_sucesso','O contrato foi CRIADO com sucesso.');
        else
            \Session::flash('mensagem_erro','Houve erros ao processar sua solicitação.');

        return Redirect::to('/contracts/index');

    }

    public function list()
    {
        $contract = Contract::all();
        return DataTables::of($contract)->make(true);
    }

    public function edit($id)
    {
        
        $contract = Contract::findOrFail($id);

        return view('admin.contracts.contract')
        ->with('contract', $contract);
    }

    public function update(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'text_contract' => 'required',

        ]);
        
        $contract = Contract::find($id);
        $contract->update($request->all());

        if($contract)
        \Session::flash('mensagem_sucesso','O '.$request->text_contract.' foi ATUALIZADO com sucesso.');
        else
            \Session::flash('mensagem_erro','Houve erros ao processar sua solicitação.');

        return Redirect::to('admin.contracts.index');

    }

    public function destroy($id)
    {
        $text_contract = Contract::find($id);
        return response()->json([ 'text_contract' => $text_contract->delete() ]);
    }
}
