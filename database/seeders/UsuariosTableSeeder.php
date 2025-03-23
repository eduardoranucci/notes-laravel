<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        
        // cria varios usuarios
        DB::table('usuarios')->insert([
            [
                'usuario' => 'usuario1@gmail.com',
                'senha' => bcrypt('123456789'),
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'usuario' => 'usuario2@gmail.com',
                'senha' => bcrypt('123456789'),
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'usuario' => 'usuario3@gmail.com',
                'senha' => bcrypt('123456789'),
                'created_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
