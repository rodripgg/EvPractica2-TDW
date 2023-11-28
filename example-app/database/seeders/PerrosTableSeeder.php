<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Perro;

class PerrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Perro::create([
            'nombre' => 'Max',
            'url_foto' => 'url_de_la_foto.jpg',
            'descripcion' => 'Perro muy juguetón',
        ]);

        Perro::create([
            'nombre' => 'Bella',
            'url_foto' => 'otra_url_de_la_foto.jpg',
            'descripcion' => 'Perro amigable y cariñoso',
        ]);

        Perro::create([
            'nombre' => 'Copi copi',
            'url_foto' => 'otra_url_de_la_foto.jpg',
            'descripcion' => 'otro perro amigable y cariñoso',
        ]);

        Perro::create([
            'nombre' => 'Chaucha',
            'url_foto' => 'otra_url_de_la_foto.jpg',
            'descripcion' => 'perro guaton',
        ]);
    }
}
