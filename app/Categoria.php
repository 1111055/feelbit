<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
     protected $fillable = [
        'titulo', 'subtitulo', 'ordem','activo'
    ];
    

    public static function getCategorias()
    {



        $valty = Categoria::where('activo','=','1')->orderBy('ordem','asc')->get();

                $cart = array();


                foreach ($valty as $key => $variable) 
                {

                      $cart2 = array();

                      if(count($variable->produtos) > 0){
                       
                            foreach ($variable->subcategoria as $key => $variabletmp)
                            {
                                $cart2[] = array('menu' => $variabletmp['titulo'], 'id' => $variabletmp['id']);
                            }

                      }

                      $cart[] = array('menu' => $variable['titulo'], 'id' => $variable['id'], 'produtos' => $cart2);

                            
                }

                return $cart;

    }

    public function subcategoria(){

    	 return $this->hasMany('App\Subcategoria');
    }

    public static function getSelection(){

       $categoria = Categoria::
                 where('titulo', '!=', '')
                 ->orderBy('ordem','asc')->get();


       $selcat = $categoria->pluck('titulo','id');

       
       $selcat->prepend('-- Escolha uma opção -- ',0);

        return $selcat;
    }

    public function produtos(){

         return $this->hasMany('App\Produto');
    }
}
