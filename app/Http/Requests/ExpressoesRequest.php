<?php

namespace App\Http\Requests;
use App\Expressoes;
use Illuminate\Foundation\Http\FormRequest;

class ExpressoesRequest extends FormRequest
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

            'expression'  => 'required'
        ];

    }
   public function messages()
    {
        return [
            'required' => "ERRO: Falta preencher :attribute"
        ];
    }
    
    public function persist(){
   
       Expressoes::create([
            'expression' => request()->expression,
            'descricao'  => request()->desc,
        ]);
    }
}
