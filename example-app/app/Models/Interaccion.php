<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Interaccion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'interacciones';

    protected $fillable = ['perro_interesado_id', 'perro_candidato_id', 'preferencia'];
}
