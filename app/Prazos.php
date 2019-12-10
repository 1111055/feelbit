<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Prazos;
class Prazos extends Model
{
     protected $fillable = [
        'titulo','descricao', 'dias', 'ordem', 'activo'
    ];
    

    public static function getPrazos()
    {

        $valty = Prazos::orderBy('ordem','asc')->get();
         

        return $valty;
    }

    public static function getSelection(){

       $item = Prazos::
                 where('titulo', '!=', '')
                 ->orderBy('ordem','asc')->get();


       $itemtmp = $item->pluck('titulo','id');

       
       $itemtmp->prepend('-- Escolha uma opção -- ',0);

       return $itemtmp;
    }
}
