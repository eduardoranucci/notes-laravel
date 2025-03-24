<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Services\Operacoes;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class MainController extends Controller {
    
    public function index() {

        $id = session('usuario.id');
        $notas = Usuario::find($id)->notas()->get()->toArray();

        return view('home', ['notas' => $notas]);
    }

    public function novo() {
        echo 'criando nova nota';
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
