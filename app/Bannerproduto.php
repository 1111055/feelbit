<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Banner;

class Bannerproduto extends Model
{
    protected $fillable = [
        'produto_id', 'banner_id', 'categoria_id'
    ];
    

    public static function getBannerHome()
    {

        $valty = Banner::where('produto','=','1')->orderBy('ordem','asc')->get();

        return $valty;
    }

    public function produto(){


    	 return $this->belongsTo('App\Produto');
    }

    public function banner(){

       
    	 return $this->belongsTo('App\Banner');
    }

    public function categoria(){


    	 return $this->belongsTo('App\Categoria');
    }


}
