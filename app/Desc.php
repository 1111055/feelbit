<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desc extends Model
{
    protected $fillable = [
        'page_id', 'titulo', 'descricao', 'descricao1', 'link', 'path','ordem', 'activo','class'
    ];
    

    public static function getDesc()
    {

        $valty = DB::table('descs')
            ->get();

        return $valty;
    }
}
