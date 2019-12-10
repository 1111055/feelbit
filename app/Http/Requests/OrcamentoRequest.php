<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Orcamento;
class OrcamentoRequest extends FormRequest
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

            'nome'   => 'required',
            'email'  => 'required'
        ];

    }
   public function messages()
    {
        return [
            'required' => "ERRO: Falta preencher :attribute"
        ];
    }
    
    public function persist($path){
   
       $data = Orcamento::create([
            'nome'       => request()->nome,
            'telemovel'  => request()->telemovel,
            'email'      => request()->email,
            'empresa'    => request()->empresa,
            'obs'        => request()->obs,
            'pathfile'   => $path
        ]);

       return $data;
    }
}
