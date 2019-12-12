<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\BannerLine;
use App\Banner;
use Image;
use File;


class BannerLineRequest extends FormRequest
{
    /* Determine if the user is authorized to make this request.
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

       $bn = Banner::find(request()->idbannner);
       $imagename  = "";
       //dd(request()->hasFile('banerimg'));
       
        if(request()->hasFile('banerimg')) {

           $imagename = request()->root().'/Banners/CROP/'.$this->saveImage(request()->file('banerimg'),request()->idbannner,$bn->width,$bn->height);
        }
       
       BannerLine::create([
            'idbannner'  => request()->idbannner,
            'titulo'     => request()->titulo,
            'subtitulo'  => request()->subtitulo,
            'descricao'  => request()->descricao,
            'link'       => request()->link,
            'path'       => $imagename,
            'ordem'      => request()->ordem,
            'activo'     => 1
        ]);
    }

    private function saveImage($photo,$idbanner,$_compv1,$_largv1){

               $lastrecord = BannerLine::getLastRecord();
                    if($lastrecord !== null){
                        $lastid = $lastrecord->id;
                    }else{
                        $lastid = 1;
                    }

                    $lastid += 10;
                    $imagename = "";
                   if($photo) {
                       
                        
                        //Nome Do Ficheiro
                        $filenamewithextension = $photo->getClientOriginalName();
                 
                        //Nome Sem Extensão 
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                 
                        //Extenção do ficheiro
                        $extension = $photo->getClientOriginalExtension();
                 
                        //Novo nome do ficheiro
                        $imagename = "banner_".$idbanner.'_'.$lastid.'.'.$photo->getClientOriginalExtension(); 

                        $data = getimagesize($photo);
                        $width = $data[0];
                        $height = $data[1];

                 
                        if(file_exists(base_path('/Banners/'.$imagename))){

                              unlink(base_path('/Banners/'.$imagename));

                        }
    
                        //Upload File                     
                        $file = $photo->storeAs('Banners', $imagename, 'upload');
                        
                        
                       // crop image

                        $destinationPath = base_path('/Banners/CROP');
                        $thumb_img = Image::make($photo->getRealPath());
                    
                        if(file_exists(base_path('/Banners/CROP/'.$imagename))){

                              unlink(base_path('/Banners/CROP/'.$imagename));

                        }

                        $altura =   $height;
                        $comprimento = $width;

                        $divisaoalt = $_largv1 / $altura; 
                        $divisaocom = $_compv1 / $comprimento;

                        if($divisaoalt < $divisaocom){
                            $altfinal = $altura * $divisaoalt;
                            $cmpfinal = $comprimento * $divisaoalt;
                        }else{
                            $altfinal = $altura * $divisaocom;
                            $cmpfinal = $comprimento * $divisaocom;

                        }

                        // Resized image
                        $thumb_img->resize($cmpfinal, $altfinal, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                        // Canvas image
                        $canvas = Image::canvas($_compv1, $_largv1);
                        $canvas->insert($thumb_img, 'center');
                        $canvas->save($destinationPath.'/'.$imagename,90);
                                    
                    }

   

            return ($imagename);
    }
}

