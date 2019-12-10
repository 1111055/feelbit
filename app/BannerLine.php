<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BannerLine;

class BannerLine extends Model
{
    protected $fillable = [
        'idbannner', 'titulo', 'subtitulo','descricao','link','path', 'ordem', 'activo'
    ];

    public static function getBannerHome($idpage)
    {

        $valty = BannerLine::where('idbannner','=',$idpage)
        ->where('path','!=',' ')
        ->where('activo','=',1)->orderBy('ordem','asc')->get();

        return $valty;
    }

    public static function getLastRecord(){

    	return BannerLine::where('titulo', '!=', '')->orderBy('id', 'desc')->first();
    }

    
}
