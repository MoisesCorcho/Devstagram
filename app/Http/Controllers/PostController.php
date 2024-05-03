<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->latest()->paginate(20);

        return view('dashboard', [
            'posts' => $posts,
            'user'  => $user
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(User $user, Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }

    public function store(PostRequest $request)
    {
        // Forma 1
        Post::create($request->validated());

        //Forma 2
        // $request->user()->post()->create([
        //     'titulo' => $request->titulo,
        //     'descripcion' =>  $request->descripcion,
        //     'imagen' =>  $request->imagen,
        //     'user_id' =>  $request->auth()->user()->id
        // ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        $pathImage = public_path('uploads') . '/' . $post->imagen;

        if (File::exists($pathImage)) {
            unlink($pathImage);
        }

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
