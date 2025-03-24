<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
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

        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->route('home');
        }

        echo "editando a nota $id";
    }

    public function deleta($id) {

        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->route('home');
        }

        echo "deletando a nota $id";
    }
}
