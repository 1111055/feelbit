<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = [
        'nome', 'link', 'class','activo', 'menomonica', 'ordem'
    ];
    

    public static function getSocial()
    {

        $valty = DB::table('socials')->Where('activo', '=', '1')->orderby('ordem','asc')
            ->get();

        return $valty;
    }
}



