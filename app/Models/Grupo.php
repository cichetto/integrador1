<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    
    protected $fillable = ['descricao'];

    public static function grupoList(){
        $grupoCollection = self::all();
        $grupoData = $grupoCollection->toArray();

        $list = array();
        foreach($grupoData as $grupo){
            $list[$grupo['id']] = $grupo['descricao'];
        }

        return $list;
    }

    public static function getDescricao($id){
        $grupoCollection = self::find($id);
        $grupoData = $grupoCollection->toArray();

        return $grupoData['descricao'];
    }

}
