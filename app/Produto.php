<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
       'id','sku','cod_art', 'titulo', 'subtitulo', 'descricao', 'obs', 'categoria_id', 'subcategoria_id','familia_id','subfamilia_id',
       'prazos_id', 'lote', 'link', 'path','pathbig', 'ordem', 'activo','visualizado','requisitado','sexo','desconto'
    ];
    



    public function imagensproduto(){

         return $this->hasMany('App\Produtoimagen');
    }
    public function produtocor(){

         return $this->hasMany('App\ProdutoCor');
    }
   public function produtosize(){

         return $this->hasMany('App\ProdutoSize');
    }
    public static function getProdutos()
    {

        $valty = Produto::where('activo','=','1')->orderBy('ordem','asc')->get();

        return $valty;
    }

    public function cor(){

    	return $this->belongsTo('App\Color');
    }
    public function size(){

    	return $this->belongsTo('App\Size');
    }
    public function prazos(){

    	return $this->belongsTo('App\Prazos');
    }
    public function categoria(){

        return $this->belongsTo('App\Categoria');
    }
    public function subcategoria(){

       return $this->belongsTo('App\Subcategoria');
    }
    public function familia(){

        return $this->belongsTo('App\Familia');
    }
    public function subfamilia(){

        return $this->belongsTo('App\Subfamilia');
    }

    public static function getProduto($id)
    {

        $valty = Produto::findOrFail($id);

        return $valty;
    }
    public static function getBannerProduto($id)
    {
     return $this->belongsToMany('App\Bannerproduto');
    }

}
