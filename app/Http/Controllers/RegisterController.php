<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    
    public function index () {
        return view('auth.registro');
    }

    public function store (Request $request){
        //dd($request);
        //dd($request)-> get('username');

        //Modifica el Request
        $request->request->add(['username' => Str::slug($request->username)]);
        
        //Validacion
        $request->validate([
            'name' => 'required|max:20',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request ->username,
            'email' => $request->email,
            'password' => $request-> password
        ]);

        //Redireccionar
        return redirect()->route('posts.index');
    }
}
