<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        //Got the users we follow
        $user = auth()->user();

        $followingsId = $user->followings->pluck('id')->toArray();

        $posts = Post::whereIn('user_id', $followingsId)->latest()->paginate(20);

        return view('home', [
            'posts' => $posts
        ]);
    }
}
