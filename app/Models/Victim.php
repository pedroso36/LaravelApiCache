<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Victim extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'documento',
        'idade',
        'data_de_nascimento',
        'genero',
        'cidade',
        'endereco',
        'familiar_em_outro_abrigo',
        'nome_do_primeiro_abrigo',
        'observacao',
        'nome_do_voluntario'
    ];
}
