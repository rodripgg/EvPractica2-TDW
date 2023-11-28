<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perro extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'perros';

    protected $fillable = ['nombre', 'foto_url', 'descripcion'];
}
