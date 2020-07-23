<?php

namespace TattooOpen\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Redirect;
use Storage;
use TattooOpen\Http\Controllers\Controller;
use TattooOpen\Posts;

class PostController extends Controller
{
    public function index()
    {
        $posts = Posts::all();
        return view('admin.postes.index', compact(['posts']));
    }

    public function store(Request $request)
    {
        $path = $request->file('arquivo')->store('imagens', 'public');

        $post = new Posts();
        $post->desciption_promotion = $request->input('desciption_promotion');
        $post->arquivo = $path;
        $post->save();

        return Redirect::to('/postes/index');
    }

    public function destroy($id)
    {
        $post = Posts::find($id);
        if (isset($post)) {
            Storage::disk('public')->delete($post->arquivo);
            $post->delete();
        }
        return Redirect::to('/postes/index');
    }

    public function download($id)
    {
        $post = Posts::find($id);
        if (isset($post)) {
            $path = Storage::disk('public')->getDriver()->getAdapter()->applyPathPrefix($post->arquivo);
            return response()->download($path);
        }
        return Redirect::to('/postes/index');
    }

}
