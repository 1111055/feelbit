<?php

namespace App\Http\Requests;
use App\Social;
use Illuminate\Foundation\Http\FormRequest;

class SocialRequest extends FormRequest
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


            'nome'  => 'required',
            'link'  => 'required',
            'class' => 'required',
            'ordem' => 'required',

        ];

    }
   public function messages()
    {
        return [
            'required' => "ERRO: Falta preencher :attribute"
        ];
    }
    
    public function persist(){


   
       Social::create([
            'nome'         => request()->nome,
            'link'         => request()->link,
            'menomonica'   => request()->menomonica,
            'class'        => request()->class,
            'ordem'        => request()->ordem,

        ]);
    }
}
