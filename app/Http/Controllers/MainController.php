<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index($valor) {
        return view('main', ['valor' => $valor]);
    }

    public function page2($valor) {
        return view('page2', ['valor' => $valor]);
    }

    public function page3($valor) {
        return view('page3', ['valor' => $valor]);
    }
}
