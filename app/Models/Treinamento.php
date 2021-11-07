<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treinamento extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao', 'area_id', 'validade', 'celulas', 'anexo'];

}
