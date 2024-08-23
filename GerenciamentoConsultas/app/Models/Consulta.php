<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'especialidade',
        'horario',
        'data_consulta',
        'status',
        'disponivel',
    ];

    protected $casts = [
        'data_consulta' => 'date',
      
        'disponivel' => 'boolean',
    ];
}
