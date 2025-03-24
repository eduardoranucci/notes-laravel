<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Usuario;
use App\Services\Operacoes;
use Illuminate\Http\Request;

class MainController extends Controller {
    
    public function index() {

        $id = session('usuario.id');
        $notas = Usuario::find($id)
            ->notas()
            ->whereNull('deleted_at')
            ->get()
            ->toArray();

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
        $nota = Nota::find($id);

        return view('edita_nota', ['nota' => $nota]);
    }

    public function editaSubmit(Request $request) {

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

        // checa se o id da nota existe
        if($request->nota_id == null) {
            return redirect()->route('home');
        }

        // descriptografa o id
        $id = Operacoes::descriptografaId($request->nota_id);

        // recupera a nota
        $nota = Nota::find($id);

        // atualiza a nota
        $nota->titulo = $request->titulo;
        $nota->texto = $request->texto;
        $nota->save();

        // redireciona para a home
        return redirect()->route('home');
    }

    public function deleta($id) {

        $id = Operacoes::descriptografaId($id);
        
        // recupera a nota
        $nota = Nota::find($id);

        // mostra confirmação
        return view('deleta_nota', ['nota' => $nota]);
    }

    public function deletaConfirmacao($id) {

        // descriptografa o id
        $id = Operacoes::descriptografaId($id);

        // recupera a nota
        $nota = Nota::find($id);

        // hard delete
        // $nota->delete();

        // soft delete
        // $nota->deleted_at = date('Y-m-d H:i:s');
        // $nota->save();

        // soft delete (model)
        $nota->delete();

        // redireciona para a home
        return redirect()->route('home');
    }
}
