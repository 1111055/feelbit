<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoSize extends Model
{
     protected $fillable = [
        'produto_id','size_id', 'ordem'
    ];
    

    public static function getSizesProds()
    {

        $valty = ProdutoSize::orderBy('ordem','asc')->get();
         

        return $valty;
    }

        public function size(){

    	return $this->belongsTo('App\Size','size_id');
    }
}
