<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Interaccion;

class InteraccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Interaccion::create([
            'perro_interesado_id' => 1,
            'perro_candidato_id' => 2,
            'preferencia' => 'aceptado',
        ]);

        Interaccion::create([
            'perro_interesado_id' => 3,
            'perro_candidato_id' => 1,
            'preferencia' => 'rechazado',
        ]);
    }
}
