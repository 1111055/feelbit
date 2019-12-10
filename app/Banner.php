<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Banner extends Model
{
    protected $fillable = [
        'titulo', 'descricao', 'ordem', 'activo', 'width', 'height','produto'
    ];
    

    public static function getBannerHome()
    {

        $valty = Banner::where('id','=','1')->orderBy('ordem','asc')->get();

        return $valty;
    }

    public function getBannerProdutoCategoria()
    {
       return $this->hasMany('App\Bannerproduto');
    }
}
