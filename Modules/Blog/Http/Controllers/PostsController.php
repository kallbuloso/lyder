<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Models\Post;
use Modules\Blog\Models\Tag;
use Modules\Blog\Models\Category;
use Carbon\Carbon;

class PostsController extends Controller
{
    protected $limit = 6;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function blog()
    {
        $posts = Post::with('author')
            ->latestFirst()
            ->published()
            ->paginate($this->limit);
        $tags = Tag::all();

        return view('blog::index', compact('posts', 'tags'));
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::latest('created_at')->get();
        return view('blog::admin.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->toArray();
        $tags = Tag::pluck('name', 'id')->toArray();
        return view('blog::admin.postcreate', compact('categories', 'tags'));
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(Post $post)
    {
        //$post = Post::find($id);
        $tags = Tag::all();
        return view('blog::show', compact('post','tags'));
        // return $post;
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        /**
         * validação
         */
        $request->validate([
            'title' => 'required|string|max:50|unique:posts',
            'excerpt' => 'required|string|max:150',
            'body' => 'required',
            'categories' => 'required',
        ]);
        /**
         * verifica se o published_at não é null e adiciona a hora
         */
        $dat = $request->get('published_at');
        if (!$dat == null) {
            $publishAt = $request->get('published_at');
            $dataT = implode('-', array_reverse(explode('/', $publishAt)));
            $dat = date('Y-m-d', strtotime($dataT));
            $dat = $dat. date(' H:i:s');                
        } else {            
            $dat = null;
        }  

        /**
         * Salvar
         */
        $post = new Post;
        $post->author_id = '1';
        $post->title = $request->get('title'); //max 50 caracteres
        $post->slug = str_slug($post->title);
        $post->url = str_slug($post->title);
        $post->body = $request->get('body');
        $post->excerpt = $request->get('excerpt'); // max 150 caracteres
        $post->published_at = $dat; 
        $post->category_id = $request->get('categories');
        $post->save();
        $post->tags()->attach($request->get('tags'));
        
        return redirect()->route('post.edit', $post)->with('flash', 'Publicado com sucesso');
        // return dd($dat);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('name', 'id')->toArray();
        $tags = Tag::pluck('name', 'id')->toArray();
        return view('blog::admin.postedit', compact('categories', 'tags', 'post'));
        //return dd($post);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, Post $post )
    {
        /**
         * validação
         */
        $request->validate([
            'title' => 'required|string|max:50',
            'excerpt' => 'required|string|max:150',
            'body' => 'required',
            'categories' => 'required',
        ]);
        /**
         * verifica se o published_at não é null e adiciona a hora
         */
        $dat = $request->get('published_at');
        if (!$dat == null) {
            $publishAt = $request->get('published_at');
            $dataT = implode('-', array_reverse(explode('/', $publishAt)));
            $dat = date('Y-m-d', strtotime($dataT));
            $dat = $dat. date(' H:i:s');                
        } else {            
            $dat = null;
        } 

        $post->author_id = '1';
        $post->title = $request->get('title'); //max 50 caracteres
        $post->slug = str_slug($post->title);
        $post->url = str_slug($post->title);
        $post->body = $request->get('body');
        $post->excerpt = $request->get('excerpt'); // max 150 caracteres
        $post->published_at = $dat; 
        $post->category_id = $request->get('categories');
        $post->save();
        $post->tags()->sync($request->get('tags'));
        
        return redirect()->route('post.edit', $post)->with('flash', 'Artigo atualizado com sucesso');
        //return dd($post);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
