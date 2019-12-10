<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use ProdutoColor;

class ProdutoColorRequest extends FormRequest
{
     public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

           
        ];

    }
   public function messages()
    {
        return [
            'required' => "ERRO: Falta preencher :attribute"
        ];
    }
    
    public function persist($idproduto, $idcor){
   
       ProdutoColor::create([
            'produto_id' => $idproduto,
            'color_id'   => $idcor,
        ]);
    }
}
