<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Subcategoria;

class SubcategoriaRequest extends FormRequest
{
     /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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

            'titulo'  => 'required'
        ];

    }
   public function messages()
    {
        return [
            'required' => "ERRO: Falta preencher :attribute"
        ];
    }
    
    public function persist(){
   
       Subcategoria::create([
            'titulo'      => request()->titulo,
            'subtitulo'   => request()->descricao,
            'idcategoria' => request()->idcategoria,
            'ordem'       => request()->ordem,
            'activo'      => 1
        ]);
    }
}
