<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orcamentoline extends Model
{
     protected $fillable = [
        'orcamento_id', 'color_id', 'size_id', 'quantidade', 'produto_id'
    ];


    public function produto(){

    	return $this->belongsTo('App\Produto');
    }



    public function cor(){

    	return $this->belongsTo('App\Color','color_id');
    }



    public function tamanho(){

    	return $this->belongsTo('App\Size','size_id');
    }



    public function orcamento(){

    	return $this->belongsTo('App\Orcamento');
    }



}
