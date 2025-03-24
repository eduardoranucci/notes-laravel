<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class MainController extends Controller {
    
    public function index() {

        $id = session('usuario.id');
        $notas = Usuario::find($id)->notas()->get()->toArray();

        return view('home', ['notas' => $notas]);
    }

    public function novaNota() {
        echo 'criando nova nota';
    }

}
