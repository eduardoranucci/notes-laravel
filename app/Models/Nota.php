<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model {
    
    public function usuario() {
        return $this->belongsTo(Usuario::class);
    }
}
