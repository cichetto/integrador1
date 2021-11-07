<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['login', 'senha', 'cadastro', 'nome', 'grupo_id', 'area_id', 'tipo'];

}
