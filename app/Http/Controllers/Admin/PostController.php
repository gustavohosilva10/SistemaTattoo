<?php

namespace TattooOpen\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Redirect;
use Storage;
use TattooOpen\Http\Controllers\Controller;
use TattooOpen\posts;

class PostController extends Controller
{
    public function index()
    {
        $posts = posts::all();
        return view('admin.postes.index', compact(['posts', $posts]));
    }

    public function store(Request $request)
    {
        $path = $request->file('arquivo')->store('imagens', 'public');

        $post = new posts();
        $post->desciption_promotion = $request->input('desciption_promotion');
        $post->arquivo = $path;

        $post->save();

        return Redirect::to('/postes/index');
    }

    public function destroy($id)
    {
        $post = posts::find($id);
        if (isset($post)) {
            Storage::disk('public')->delete($post->arquivo);
            $post->delete();
        }
        return Redirect::to('/postes/index');
    }

    public function download($id)
    {
        $post = posts::find($id);
        if (isset($post)) {
            $path = Storage::disk('public')->getDriver()->getAdapter()->applyPathPrefix($post->arquivo);
            return response()->download($path);
        }
        return Redirect::to('/postes/index');
    }

}
