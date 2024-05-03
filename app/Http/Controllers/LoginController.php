<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $data = collect($request->validated())->only('email', 'password')->toArray();

        if ( ! Auth::attempt( $data ) ) {
            return back()->with('mensaje', 'Credenciales Incorrectas');
        }

        // If authentication is successful, you should regenerate
        // the user's session to prevent session fixation:
        $request->session()->regenerate();

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
