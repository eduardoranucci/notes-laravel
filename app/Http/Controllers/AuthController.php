<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller {
    
    public function login() {
        return view('login');
    }

    public function loginSubmit(Request $request) {

        // validação do form
        $request->validate(
            [
                'usuario' => 'required',
                'senha' => 'required',
            ]
        );

        // get input do usuario
        $usuario = $request->input('usuario');
        $senha = $request->input('senha');
        
        echo 'OK!';
    }

    public function logout() {
        echo 'logout';
    }
}
