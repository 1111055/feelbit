<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
     protected $fillable = [
        'titulo', 'subtitulo', 'ordem','activo'
    ];
    

    public static function getFamilias()
    {

        $valty = Familia::where('activo','=','1')->orderBy('ordem','asc')->get();

        return $valty;
    }

        public function subfamilia(){

    	return $this->hasMany('App\Subfamilia');
    }

    public static function getSelection(){

       $item = Familia::
                 where('titulo', '!=', '')
                 ->orderBy('ordem','asc')->get();


       $itemtmp = $item->pluck('titulo','id');

       
       $itemtmp->prepend('-- Escolha uma opção -- ',0);

       return $itemtmp;
    }
}
