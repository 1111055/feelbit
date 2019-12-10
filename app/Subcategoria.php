<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
     protected $fillable = [
        'titulo', 'subtitulo','categoria_id','ordem','activo'
    ];
    

    public static function getSubCategorias()
    {

        $valty = Subategoria::where('activo','=','1')->orderBy('ordem','asc')->get();

        return $valty;
    }

    public function categoria(){

    	return $this->belongsTo('App\Categoria');
    }


    public function produtos(){

       return $this->hasMany('App\Produto');
    }


    public static function getSelection(){

       $item = Subcategoria::
                 where('titulo', '!=', '')
                 ->orderBy('ordem','asc')->get();


       $itemtmp = $item->pluck('titulo','id');

       
       $itemtmp->prepend('-- Escolha uma opção -- ',0);

       return $itemtmp;
    }
}
