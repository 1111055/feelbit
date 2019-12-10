<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Produtoimagen;
use Image;
use File;
use Carbon\Carbon;


class ProdutoImagenRequest extends FormRequest
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

        
        ];

    }
   public function messages()
    {
        return [
            'required' => "ERRO: Falta preencher :attribute"
        ];
    }
    
    public function persist(){

         $prod = Produtoimagen::orderBy('id','desc')->first();
   
         if($prod != null){
            $idpt = $prod->id+1;
         }else{
            $idpt = 1;
         }

         $idprod = request()->idprod;
       
         if(request()->hasFile('prodimg')) {

                $photo = request()->file('prodimg');
               
                //Nome Do Ficheiro
                $filenamewithextension = request()->file('prodimg')->getClientOriginalName();
         
                //Nome Sem Extensão 
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
         
                //Extenção do ficheiro
                $extension = request()->file('prodimg')->getClientOriginalExtension();
         
                //Novo nome do ficheiro
                $imagename = "prod_".$idprod.'_'.$idpt.'.'.$photo->getClientOriginalExtension();
                $imagenamebig = "prod_big_".$idprod.'_'.$idpt.'.'.$photo->getClientOriginalExtension();

                $data = getimagesize($photo);
                $width = $data[0];
                $height = $data[1];

                $namepng = "prod_".request()->id.'.png';
                $namejgp = "prod_".request()->id.'.jpg';
                $namegif = "prod_".request()->id.'.gif';
                $nametiff = "prod_".request()->id.'.tiff';

         
                if(file_exists(public_path('/img/Produtos/'.$namepng))){

                      unlink(public_path('/img/Produtos/'.$namepng));

                }
               if(file_exists(public_path('/img/Produtos/'.$namejgp))){

                      unlink(public_path('/img/Produtos/'.$namejgp));

                }
                if(file_exists(public_path('/img/Produtos/'.$namegif))){

                      unlink(public_path('/img/Produtos/'.$namegif));

                }
                if(file_exists(public_path('/img/Produtos/'.$nametiff))){

                      unlink(public_path('/img/Produtos/'.$nametiff));

                }


                //Upload File                     
                $file = request()->file('prodimg')->storeAs('Produtos', $imagename, 'upload');
                
                
               // crop image

                $destinationPath = public_path('/img/Produtos/CROP');
                $thumb_img = Image::make($photo->getRealPath());
            
                if(file_exists(public_path('/img/Produtos/CROP/'.$imagename))){

                      unlink(public_path('/img/Produtos/CROP/'.$imagename));

                }

                $altura =   $height;
                $comprimento = $width;


                $divisaocom = 270 / $comprimento;
                $divisaoalt = 380 / $altura; 

                if($divisaoalt < $divisaocom){
                    $altfinal = $altura * $divisaoalt;
                    $cmpfinal = $comprimento * $divisaoalt;
                }else{
                    $altfinal = $altura * $divisaocom;
                    $cmpfinal = $comprimento * $divisaocom;

                }
                $_path = request()->root().'/img/Produtos/CROP/'.$imagename;
                // Resized image
                $thumb_img->resize($cmpfinal, $altfinal, function ($constraint) {
                    $constraint->aspectRatio();
                });
                // Canvas image
                $canvas = Image::canvas(270, 380);
                $canvas->insert($thumb_img, 'center');
                $canvas->save($destinationPath.'/'.$imagename,100);

                // imagebig

                $divisaocom = 468 / $comprimento;
                $divisaoalt = 659 / $altura; 

                if($divisaoalt < $divisaocom){
                    $altfinal = $altura * $divisaoalt;
                    $cmpfinal = $comprimento * $divisaoalt;
                }else{
                    $altfinal = $altura * $divisaocom;
                    $cmpfinal = $comprimento * $divisaocom;

                }
                $_pathbig = request()->root().'/img/Produtos/CROP/'.$imagenamebig;
                // Resized image
                $thumb_img->resize($cmpfinal, $altfinal, function ($constraint) {
                    $constraint->aspectRatio();
                });
                // Canvas image
                $canvas = Image::canvas(468, 659);
                $canvas->insert($thumb_img, 'center');
                $canvas->save($destinationPath.'/'.$imagenamebig,100);
                            
       }

     if(isset($prod) && $prod->cont > 0){

        $contador = $prod->cont+1;
     }else{
        $contador = 1;
     }

     // dd( $_pathbig);
       Produtoimagen::create([
            'produto_id' => $idprod,
            'cont'       => $contador,
            'path'       => $_path,
            'pathbig'    =>  $_pathbig,
            'ordem'      => request()->ordem,
            'activo'     => request()->activo,
            'destacar'   => request()->destacar
        ]);
    }
}