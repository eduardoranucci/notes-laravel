<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller {
    
    public function login() {
        return view('login');
    }

    public function loginSubmit(Request $request) {

        // validação do form
        $request->validate(
            // regras
            [
                'usuario' => 'required|email',
                'senha' => 'required|min:6|max:16',
            ],
            // mensagens de erro
            [
                'usuario.required' => 'O E-mail é obrigatório',
                'usuario.email' => 'O E-mail deve ser válido',
                'senha.required' => 'A senha é obrigatória',
                'senha.min' => 'A senha deve ter no mínimo :min caracteres',
                'senha.max' => 'A senha deve ter no máximo :max caracteres',
            ]
        );

        // get input do usuario
        $usuario = $request->input('usuario');
        $senha = $request->input('senha');
        
        // testa conexão com a base de dados
        try {
            DB::connection()->getPdo();
            echo 'Conexão OK!';
        } catch (\PDOException $e) {
            echo 'Conexão falhou: ' . $e->getMessage();
        }

        echo '<br>Fim';
    }

    public function logout() {
        echo 'logout';
    }
}
