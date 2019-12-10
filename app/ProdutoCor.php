<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ProdutoCor extends Model
{
    protected $fillable = [
        'produto_id','color_id', 'ordem'
    ];
    

    public static function getSizesProds()
    {

        $valty = ProdutoCor::orderBy('ordem','asc')->get();
         

        return $valty;
    }

    public function cor(){

    	return $this->belongsTo('App\Color','color_id');
    }

}
