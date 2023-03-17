<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Link;
use App\Models\Marca;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Ivan Ruiz';
        $user->email = 'ivanruiz12@gmail.com';
        $user->save();
        // $marcas = new Marca();
        // $marcas->nombre = 'CVA';
        // $marcas->save();
        // $link = new Link();
        // $link->marca = 'ingram';
        // $link->descripcion = 'Detalles tecnicos';
        // $link->link = 'https://wwww.ingram.com';
        // $link->save();
    }
}
