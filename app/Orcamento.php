<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    protected $fillable = [
        'nome', 'telemovel', 'email', 'empresa', 'obs', 'pathfile'
    ];
    

    public function getOrcamentolines()
    {
       return $this->hasMany('App\Orcamentoline');
    }
}
