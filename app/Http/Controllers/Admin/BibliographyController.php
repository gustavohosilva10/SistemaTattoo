<?php

namespace TattooOpen\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Redirect;
use Storage;
use TattooOpen\Bibliography;
use TattooOpen\Http\Controllers\Controller;

class BibliographyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bibliography = Bibliography::all();
        return view('admin.bibliography.index', compact(['bibliography']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('img_perfil')->store('bibliografia', 'public');

        $bibliography = new Bibliography();
        $bibliography->name_perfil = $request->input('name_perfil');
        $bibliography->text_perfil = $request->input('text_perfil');
        $bibliography->img_perfil = $path;
        $bibliography->save();

        return Redirect::to('/bibliography/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bibliography = Bibliography::find($id);
        if (isset($bibliography)) {
            Storage::disk('public')->delete($bibliography->img_perfil);
            $bibliography->delete();
        }
        return Redirect::to('/bibliography/index');

    }

    public function download($id)
    {
        $bibliography = Bibliography::find($id);
        if (isset($bibliography)) {
            $bibliography = Storage::disk('public')->getDriver()->getAdapter()->applyPathPrefix($bibliography->img_perfil);
            return response()->download($bibliography);
        }
        return Redirect::to('/bibliography/index');
    }
}
