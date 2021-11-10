<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = ['descricao'];

    public static function areaList(){
        $areaCollection = self::all();
        $areaData = $areaCollection->toArray();

        $list = array();
        foreach($areaData as $area){
            $list[$area['id']] = $area['descricao'];
        }

        return $list;
    }

    public static function getDescricao($id){
        $areaCollection = self::find($id);
        $areaData = $areaCollection->toArray();

        return $areaData['descricao'];
    }
    
}
