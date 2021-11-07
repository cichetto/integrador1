<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'treinamento_id', 'data_inicio', 'data_fim', 'status'];

}
