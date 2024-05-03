<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function store(CommentRequest $request, User $user, Post $post)
    {
        Comment::create($request->validated());

        return back()->with('message', 'Comentario creado satisfactoriamente');
    }
}
