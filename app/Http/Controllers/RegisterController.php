<?php

namespace App\Http\Controllers;



use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        User::create( $request->validated() );

        $data = collect($request->validated())->only('email', 'password')->toArray();

        Auth::attempt( $data );

        return redirect()->route( 'posts.index', auth()->user() );
    }
}
