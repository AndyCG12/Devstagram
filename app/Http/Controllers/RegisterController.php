<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('auth.register');
    }
    public function store(Request $request){
        //validacion de los datos
        $this->validate($request,[
            'name' => 'required|min:5|max:30',
            'username' => 'required|min:3|max:20',
            'email' => 'required|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        dd('Todo bien');
        /* die('Todo bien'); */
    }
}
