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

        Perro::create([
            'nombre' => 'Maxo',
            'url_foto' => 'otra_url_de_la_foto.jpg',
            'descripcion' => 'le encanta correr y jugar al aire libre',
        ]);

        Perro::create([
            'nombre' => 'Luna',
            'url_foto' => 'otra_url_de_la_foto.jpg',
            'descripcion' => 'siempre en busca de mimos y atencion',
        ]);

        Perro::create([
            'nombre' => 'Rocky',
            'url_foto' => 'otra_url_de_la_foto.jpg',
            'descripcion' => 'le encanta explorar nuevos lugares',
        ]);

        Perro::create([
            'nombre' => 'Bellaila',
            'url_foto' => 'otra_url_de_la_foto.jpg',
            'descripcion' => ' disfruta de largos paseos y momentos tranquilos',
        ]);

        Perro::create([
            'nombre' => 'Daisy',
            'url_foto' => 'otra_url_de_la_foto.jpg',
            'descripcion' => 'siempre está listo para aprender nuevos trucos',
        ]);

        Perro::create([
            'nombre' => 'Milo',
            'url_foto' => 'otra_url_de_la_foto.jpg',
            'descripcion' => 'es el compañero perfecto para momentos de relajacion',
        ]);

        Perro::create([
            'nombre' => 'Zoe',
            'url_foto' => 'otra_url_de_la_foto.jpg',
            'descripcion' => 'encuentra diversión en todo lo que hace',
        ]);

        Perro::create([
            'nombre' => 'Dexter',
            'url_foto' => 'otra_url_de_la_foto.jpg',
            'descripcion' => 'siempre lista para nuevas experiencias',
        ]);

        Perro::create([
            'nombre' => 'Ruby',
            'url_foto' => 'otra_url_de_la_foto.jpg',
            'descripcion' => ' le gusta resolver rompecabezas y desafíos mentales',
        ]);

        Perro::create([
            'nombre' => 'Dogo',
            'url_foto' => 'otra_url_de_la_foto.jpg',
            'descripcion' => 'siempre cuidando de su familia con devoción',
        ]);

        Perro::create([
            'nombre' => 'Java',
            'url_foto' => 'otra_url_de_la_foto.jpg',
            'descripcion' => 'perro no tan guaton',
        ]);

        Perro::create([
            'nombre' => 'cpp',
            'url_foto' => 'otra_url_de_la_foto.jpg',
            'descripcion' => 'perro programador',
        ]);
    }
}
