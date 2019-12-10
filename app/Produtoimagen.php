<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtoimagen extends Model
{
    protected $fillable = [
        'produto_id', 'cont', 'path', 'ordem', 'activo', 'destacar','pathbig'
    ];
    

    public static function getBannerHome()
    {

        $valty = Produtoimagen::where('id','=','1')->orderBy('ordem','asc')->get();

        return $valty;
    }
}
