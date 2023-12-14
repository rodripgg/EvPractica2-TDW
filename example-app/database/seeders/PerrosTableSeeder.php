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
            'url_foto' => 'https://images.dog.ceo/breeds/terrier-toy/n02087046_4127.jpg',
            'descripcion' => 'Perro muy juguetón',
        ]);

        Perro::create([
            'nombre' => 'Bella',
            'url_foto' => 'https://images.dog.ceo/breeds/terrier-bedlington/n02093647_201.jpg',
            'descripcion' => 'Perro amigable y cariñoso',
        ]);

        Perro::create([
            'nombre' => 'Copi copi',
            'url_foto' => 'https://images.dog.ceo/breeds/bouvier/n02106382_590.jpg',
            'descripcion' => 'otro perro amigable y cariñoso',
        ]);

        Perro::create([
            'nombre' => 'Chaucha',
            'url_foto' => 'https://images.dog.ceo/breeds/kuvasz/n02104029_685.jpg',
            'descripcion' => 'perro guaton',
        ]);

        Perro::create([
            'nombre' => 'Maxo',
            'url_foto' => 'https://images.dog.ceo/breeds/hound-walker/n02089867_4004.jpg',
            'descripcion' => 'le encanta correr y jugar al aire libre',
        ]);

        Perro::create([
            'nombre' => 'Luna',
            'url_foto' => 'https://images.dog.ceo/breeds/shihtzu/n02086240_5140.jpg',
            'descripcion' => 'siempre en busca de mimos y atencion',
        ]);

        Perro::create([
            'nombre' => 'Rocky',
            'url_foto' => 'https://images.dog.ceo/breeds/poodle-standard/n02113799_1537.jpg',
            'descripcion' => 'le encanta explorar nuevos lugares',
        ]);

        Perro::create([
            'nombre' => 'Bellaila',
            'url_foto' => 'https://images.dog.ceo/breeds/terrier-westhighland/n02098286_2139.jpg',
            'descripcion' => ' disfruta de largos paseos y momentos tranquilos',
        ]);

        Perro::create([
            'nombre' => 'Daisy',
            'url_foto' => 'https://images.dog.ceo/breeds/newfoundland/n02111277_14689.jpg',
            'descripcion' => 'siempre está listo para aprender nuevos trucos',
        ]);

        Perro::create([
            'nombre' => 'Milo',
            'url_foto' => 'https://images.dog.ceo/breeds/pug/n02110958_15877.jpg',
            'descripcion' => 'es el compañero perfecto para momentos de relajacion',
        ]);

        Perro::create([
            'nombre' => 'Zoe',
            'url_foto' => 'https://images.dog.ceo/breeds/terrier-fox/n02095314_591.jpg',
            'descripcion' => 'encuentra diversión en todo lo que hace',
        ]);

        Perro::create([
            'nombre' => 'Dexter',
            'url_foto' => 'https://images.dog.ceo/breeds/ridgeback-rhodesian/n02087394_6382.jpg',
            'descripcion' => 'siempre lista para nuevas experiencias',
        ]);

        Perro::create([
            'nombre' => 'Ruby',
            'url_foto' => 'https://images.dog.ceo/breeds/lhasa/n02098413_643.jpg',
            'descripcion' => ' le gusta resolver rompecabezas y desafíos mentales',
        ]);

        Perro::create([
            'nombre' => 'Dogo',
            'url_foto' => 'https://images.dog.ceo/breeds/pointer-german/n02100236_4181.jpg',
            'descripcion' => 'siempre cuidando de su familia con devoción',
        ]);

        Perro::create([
            'nombre' => 'Java',
            'url_foto' => 'https://images.dog.ceo/breeds/ridgeback-rhodesian/n02087394_1099.jpg',
            'descripcion' => 'perro no tan guaton',
        ]);

        Perro::create([
            'nombre' => 'cpp',
            'url_foto' => 'https://images.dog.ceo/breeds/mountain-bernese/n02107683_3382.jpg',
            'descripcion' => 'perro programador',
        ]);
    }
}
