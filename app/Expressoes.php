<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expressoes extends Model
{
    protected $fillable = [
        'expression', 'descricao'
    ];


    public static function getExpressao($id)
    {

        $valty = Expressoes::where('id','=',$id)->get();

        return $valty;
    }
    
}
