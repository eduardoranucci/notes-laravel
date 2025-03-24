<?php

namespace App\Services;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class Operacoes {
    
    public static function descriptografaId($valor) {

        try {
            $valor = Crypt::decrypt($valor);
        } catch (DecryptException $e) {
            return redirect()->route('home');
        }
        
        return $valor;
    }
}