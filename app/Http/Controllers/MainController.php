<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller {
    
    public function index() {
        echo 'dentro do app!';
    }

    public function novaNota() {
        echo 'criando nova nota';
    }

}
