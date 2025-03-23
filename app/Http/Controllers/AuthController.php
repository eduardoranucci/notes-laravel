<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

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

        // checa se o usuario existe
        $usuario = Usuario::where('usuario', $usuario)
        ->where('deleted_at', NULL)
        ->first();

        if(!$usuario) {
            return redirect()
            ->back()
            ->withInput()
            ->with('erroLogin', 'E-mail ou senha incorretos.');
        }

        // checa se a senha está correta
        if(!password_verify($senha, $usuario->senha)) {
            return redirect()
            ->back()
            ->withInput()
            ->with('erroLogin', 'E-mail ou senha incorretos.');
        }

        // atualiza o last_login
        $usuario->last_login = date('Y-m-d H:i:s');
        $usuario->save();

        // loga o usuario
        session([
            'usuario' => [
                'id' => $usuario->id,
                'usuario' => $usuario->usuario,
            ]
        ]);

        // redireciona para a home
        return redirect()->to('/');
    }

    public function logout() {
        
        // desloga do app
        session()->forget('usuario');
        return redirect()->to('/login');
    }
}
