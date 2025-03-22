<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index($valor) {
        return view('main', ['valor' => $valor]);
    }
}
