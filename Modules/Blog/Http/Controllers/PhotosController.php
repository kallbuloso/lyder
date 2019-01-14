<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use App\Models\Auth;
// use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller;
use Modules\Blog\Models\Post;
use Modules\Blog\Models\Photo;
use Illuminate\Support\Facades\Auth;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('blog::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('blog::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'photo' => 'required|image|max:2048'
        ]);

        $post->photos()->create([
            'url' => Storage::url(request()->file('photo')->store('posts/'. Auth::id(), 'public')),
        ]);

        // Photo::create([
        //     'url' => Storage::url($photo),
        //     'post_id' => $post->id,
        // ]);
        //return back()->with('flash', 'Salvo com sucesso');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('blog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('blog::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Photo $photo)
    {

        // return $photo->url;
        $photo->delete();

        // $photoPath = str_replace('storage', 'public', $photo->url);
        // Storage::delete($photoPath);
        // Storage::disk('public')->delete($photo->url);

        return back()->with('flash', 'Imagem eliminada com sucesso');
        // return $photoPath;
    }
}
