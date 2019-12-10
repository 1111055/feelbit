<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = [
        'titulo', 'subtitulo', 'tamanho','ordem','activo'
    ];
    

    public static function getSizes()
    {

        $valty = Size::where('activo','=','1')->orderBy('ordem','asc')->get();

        return $valty;
    }


    public static function getAllSizes()
    {

        $valty = Size::where('tamanho','!=',' ')->orderBy('ordem','asc')->get();

        return $valty;
    }


    public static function getSelection(){

       $item = Size::
                 where('titulo', '!=', '')
                 ->orderBy('ordem','asc')->get();


       $itemtmp = $item->pluck('tamanho','id');

       
       $itemtmp->prepend('-- Escolha um Tamanho -- ',0);

       return $itemtmp;
    }
}
