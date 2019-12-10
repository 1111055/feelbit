<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subfamilia extends Model
{
    protected $fillable = [
        'titulo', 'subtitulo','familia_id', 'ordem','activo'
    ];
    

    public static function getSubFamilias()
    {

        $valty = SubFamilia::where('activo','=','1')->orderBy('ordem','asc')->get();

        return $valty;
    }

    public function familia(){

    	return $this->belongsTo('App\Familia');
    }

    public static function getSelection(){

       $item = Subfamilia::
                 where('titulo', '!=', '')
                 ->orderBy('ordem','asc')->get();


       $itemtmp = $item->pluck('titulo','id');

       
       $itemtmp->prepend('-- Escolha uma opção -- ',0);

        return $itemtmp;
    }
}
