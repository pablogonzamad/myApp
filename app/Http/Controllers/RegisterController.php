<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    
    public function index () {
        return view('auth.registro');
    }

    public function store (Request $request){
        //dd($request);
        //dd($request)-> get('username');

        //Validacion
        $request->validate([
            'name' => 'required|max:20',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        dd('Creando Usuario');
    }
}
