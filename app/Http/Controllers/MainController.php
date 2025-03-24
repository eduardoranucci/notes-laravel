<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Usuario;
use App\Services\Operacoes;
use Illuminate\Http\Request;

class MainController extends Controller {
    
    public function index() {

        $id = session('usuario.id');
        $notas = Usuario::find($id)->notas()->get()->toArray();

        return view('home', ['notas' => $notas]);
    }

    public function novo() {
        return view('nova_nota');
    }

    public function novoSubmit(Request $request) {
        
        // validação do form
        $request->validate(
            // regras
            [
                'titulo' => 'required|min:3|max:200',
                'texto' => 'required|min:3|max:3000',
            ],
            // mensagens de erro
            [
                'titulo.required' => 'O título é obrigatório',
                'titulo.min' => 'O título deve ter no mínimo :min caracteres',
                'titulo.max' => 'O título deve ter no máximo :max caracteres',
                'texto.required' => 'O texto é obrigatório',
                'texto.min' => 'O texto deve ter no mínimo :min caracteres',
                'texto.max' => 'O texto deve ter no máximo :max caracteres',
            ]
        );

        // pega o id do usuario
        $id = session('usuario.id');

        // cria nova nota
        $nota = new Nota();
        $nota->usuario_id = $id;
        $nota->titulo = $request->titulo;
        $nota->texto = $request->texto;
        $nota->save();

        // redireciona para a home
        return redirect()->route('home');
    }

    public function edita($id) {

        $id = Operacoes::descriptografaId($id);
        echo "editando a nota $id";
    }

    public function deleta($id) {

        $id = Operacoes::descriptografaId($id);
        echo "deletando a nota $id";
    }
}
