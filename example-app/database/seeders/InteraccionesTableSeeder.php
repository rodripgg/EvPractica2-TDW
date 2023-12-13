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
        for ($i = 1; $i <= 15; $i++) {
            for ($j = $i + 1; $j <= 15; $j++) {
                // Determina aleatoriamente si la interacción es aceptada, rechazada o no existe
                $preferencia = rand(0, 2);

                if ($preferencia == 0) {
                    Interaccion::create([
                        'perro_interesado_id' => $i,
                        'perro_candidato_id' => $j,
                        'preferencia' => 'rechazado',
                    ]);
                } elseif ($preferencia == 1) {
                    Interaccion::create([
                        'perro_interesado_id' => $i,
                        'perro_candidato_id' => $j,
                        'preferencia' => 'aceptado',
                    ]);
                }
            }
        }
    }
}
