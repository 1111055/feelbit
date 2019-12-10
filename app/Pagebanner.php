<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagebanner extends Model
{
    protected $fillable = [
        'idpage', 'idbanner'
    ];
    

    public static function getBannerFormPage($id)
    {

        $valty = Pagebanner::where('idpage','=',$id)
        					 ->get();


        return $valty;
    }
}
