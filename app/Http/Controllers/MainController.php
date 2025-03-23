<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class MainController extends Controller {
    
    public function index() {

        $id = session('usuario.id');
        $usuario = Usuario::find($id)->toArray();
        $notas = Usuario::find($id)->notas()->get()->toArray();

        echo '<pre>';
        print_r($usuario);
        print_r($notas);
        die();

        return view('home');
    }

    public function novaNota() {
        echo 'criando nova nota';
    }

}
