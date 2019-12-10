<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\ProdutoCor;
use App\ProdutoSize;
use App\Categoria;
use App\Subcategoria;
use App\Familia;
use App\Subfamilia;
use App\Banner;
use App\Color;
use App\Size;
use App\Prazos;
use App\Bannerproduto;
use App\Http\Request\ProdutoRequest;
use Image;
use File;
use Illuminate\Support\Arr;


class ProdutoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['bag', 'wish', 'removewish', 'show', 'delete','removebag']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $produto = Produto::orderBy('ordem','desc')->get();
        return view('backend.Produto.index',compact('produto'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function bag(Request $request, $id)
    {


        $arrayfinal = array();


        $prod = Produto::find($id);

        if(session()->has('bagone'))
        {
            $arrayfinal = session('bagone');
        }

 
       if($request != null){
          $arrayfinal[] = array('produto' => $prod, 'quantidade' => 0, 'cor' =>  " ", 'size' =>  " ");
       }
    
      
        //dd($arrayfinal);
       session(['bagone' => $arrayfinal]);

       return back();
    }

    public function removebag($id)
    {

        $array = [];

        if(session()->has('bagone'))
        {
            $array = session('bagone');
        }

        foreach ($array as $key => $value) {
            if($value['produto']->id == $id){
               unset($array[$key]);
            }
        }

      

       session(['bagone' => $array]);
   

       return back();
    }

    public function wish($id)
    {

       
        $array = [];
        $existe = true;
        $prod = Produto::find($id);

        if(session()->has('wish'))
        {
            $array = session('wish');
        }

        foreach ($array as $key => $value) {
            if($value->id == $id){
                $existe = false;
            }
        }

        if($existe == true){
           $array = Arr::prepend($array, $prod);
        }

       session(['wish' => $array]);
       return back();
    }

    public function removewish($id)
    {

        $array = [];

        if(session()->has('wish'))
        {
            $array = session('wish');
        }

        foreach ($array as $key => $value) {
            if($value->id == $id){
               unset($array[$key]);
            }
        }
        
       session(['wish' => $array]);
   

       return back();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         Produto::create([
            'titulo'          => request()->titulo,
            'ordem'           => request()->ordem
        ]);
       
        return redirect()->route('produto')->with('sucess','Criado com sucesso.');
    }

      public function storebanner(Request $request)
    {
         Bannerproduto::create([
            'produto_id'      => request()->produto_id,
            'banner_id'       => request()->idbannner,
            'categoria_id'    => request()->categoria_id
        ]);
       
        return back();
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         

        $arrwhi =  array();


       if(session()->has('wish')){
         foreach (session()->get('wish') as $key => $value) {
                 $arrwhi = array_add($arrwhi,$key,$value->id);
            }

       }

     
      $prod =  Produto::getProduto($id);

      $moreview = Produto::where('activo','=','1')->orderby("visualizado","desc")
      ->take(8)->get();

      $relacionados = Produto::where('activo','=','1')->where('subcategoria_id','=',$prod->subcategoria_id)->orderby("ordem")
      ->take(8)->get();

     foreach ($moreview as $key => $value) {
          if($value->path != null){
             $firstname = explode('/', trim($value->path));
            if (!file_exists(public_path('/img/Produtos/CROP/'.last($firstname)))) {

                     $value->path = request()->root().'/img/Produtos/CROP/noimage.png';
             }
          }else{
                     $value->path = request()->root().'/img/Produtos/CROP/noimage.png';
          }
      }

     foreach ($relacionados as $key => $value) {
          if($value->path != null){
             $firstname = explode('/', trim($value->path));
            if (!file_exists(public_path('/img/Produtos/CROP/'.last($firstname)))) {

                     $value->path = request()->root().'/img/Produtos/CROP/noimage.png';
             }
          }else{
                     $value->path = request()->root().'/img/Produtos/CROP/noimage.png';
          }
      }
     


     
     if($prod != null){


             $prod->visualizado  = $prod->visualizado + 1;
             $prod->save();

             $firstname = explode('/', trim($prod->path));

             if($prod->path != null){
                if (!file_exists(public_path('/img/Produtos/CROP/'.last($firstname)))) {

                         $prod->path = request()->root().'/img/Produtos/CROP/noimage.png';
                 }
              }else{
                         $prod->path = request()->root().'/img/Produtos/CROP/noimage.png';
              }
     }


        return view('frontend.produto', compact('prod','moreview','relacionados','arrwhi'));
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function banner()
    {

        $banner = Banner::where('produto','=','1')->
                 orderBy('ordem','asc')->get();
        
        return view('backend.Produto.banner',compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

         $selcat    = Categoria::getSelection();
         $selsubcat = Subcategoria::getSelection();
         $selfam    = Familia::getSelection();
         $selsubfam = Subfamilia::getSelection();
         $selcor    = Color::getSelection();
         $selsize   = Size::getSelection();
         $selprazo  = Prazos::getSelection();


         $produto   = Produto::find($id);

         $tamanhos  = Size::getAllSizes();
         $colors    = Color::getAllColors();

         $prodcor   = ProdutoCor::select('color_id')->Where('produto_id','=',$id)->get();

         $arry = array('0');

         foreach ($prodcor as $key => $value) {
            
             array_push($arry,$value->color_id);

         }

           
         $prodsize   = ProdutoSize::select('size_id')->Where('produto_id','=',$id)->get();

         $arrys = array('0');

         foreach ($prodsize as $key => $value) {
            
             array_push($arrys,$value->size_id);

         }
    
        
            
          $seltamanhos  = $tamanhos->pluck('tamanho','id');
          $selcores     = $colors->pluck('titulo','id');
    

         return view('backend.Produto.edit', compact('produto','selcat','selsubcat','selfam','selsubfam','selcor','selsize','selprazo','colors','arry','arrys','seltamanhos','selcores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $_path = $produto->path;
         $_pathbig = $produto->pathbig;

      //  dd($request->cores);
         ProdutoCor::where('produto_id', $id)->delete();
         ProdutoSize::where('produto_id', $id)->delete();

        
       if($request->has('cores')){
               
                foreach ($request->cores as $key => $value) {
                      
                           ProdutoCor::create([
                                'produto_id' => $id,
                                'color_id'   => $value,
                            ]);
                }
        }

        if($request->has('sizes')){
             
                foreach ($request->sizes as $key => $value) {
                      
                           ProdutoSize::create([
                                'produto_id' => $id,
                                'size_id'   => $value,
                            ]);
                }
        }


        if($request->hasFile('prodimg')) {

                $photo = $request->file('prodimg');
               
                //Nome Do Ficheiro
                $filenamewithextension = $request->file('prodimg')->getClientOriginalName();
         
                //Nome Sem Extensão 
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
         
                //Extenção do ficheiro
                $extension = $request->file('prodimg')->getClientOriginalExtension();
         
                //Novo nome do ficheiro
                $imagename    = "prod_".$request->id.'.'.$photo->getClientOriginalExtension(); 
                $imagenamebig = "prod_big".$request->id.'.'.$photo->getClientOriginalExtension();

                $data = getimagesize($photo);
                $width = $data[0];
                $height = $data[1];

                $namepng = "prod_".$request->id.'.png';
                $namejgp = "prod_".$request->id.'.jpg';
                $namegif = "prod_".$request->id.'.gif';
                $nametiff = "prod_".$request->id.'.tiff';

         
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
                $file = $request->file('prodimg')->storeAs('Produtos', $imagename, 'upload');
                
                
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

                //imagem big do artigo
                $divisaocom = 468 / $comprimento;
                $divisaoalt = 659 / $altura; 

                if($divisaoalt < $divisaocom){
                    $altfinalbig = $altura * $divisaoalt;
                    $cmpfinalbig = $comprimento * $divisaoalt;
                }else{
                    $altfinalbig = $altura * $divisaocom;
                    $cmpfinalbig = $comprimento * $divisaocom;

                }
                $_path = $request->root().'/img/Produtos/CROP/'.$imagename;
                // Resized image
                $thumb_img->resize($cmpfinal, $altfinal, function ($constraint) {
                    $constraint->aspectRatio();
                });
                // Canvas image
                $canvas = Image::canvas(270, 380);
                $canvas->insert($thumb_img, 'center');
                $canvas->save($destinationPath.'/'.$imagename,100);

                //imagem big
                 $_pathbig = $request->root().'/img/Produtos/CROP/'.$imagenamebig;
                // Resized image
                $thumb_img->resize($cmpfinalbig, $altfinalbig, function ($constraint) {
                    $constraint->aspectRatio();
                });
                // Canvas image
                $canvas = Image::canvas(468, 659);
                $canvas->insert($thumb_img, 'center');
                $canvas->save($destinationPath.'/'.$imagenamebig,100);
                            
       }

        $produto->cod_art          = $request->cod_art;
        $produto->titulo           = $request->titulo;
        $produto->subtitulo        = $request->subtitulo;
        $produto->descricao        = $request->descricao;
        $produto->categoria_id     = $request->categoria_id;
        $produto->subcategoria_id  = $request->subcategoria_id;
        $produto->familia_id       = $request->familia_id;
        $produto->subfamilia_id    = $request->subfamilia_id;
        $produto->prazos_id        = $request->prazos_id;
        $produto->lote             = $request->lote;
        $produto->obs              = $request->obs;
        $produto->link             = $request->link;
        $produto->path             = $_path;
        $produto->pathbig          = $_pathbig;
        $produto->ordem            = $request->ordem;
        $produto->sexo             = $request->sexo;
        $produto->activo           = ($request->activo !== '' && $request->activo !== null) ? 1 : 0;

        $produto->save();

       
         return redirect()->route('produto.edit', compact('produto'))->with('sucess','Guardado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Produto::destroy($id);

         return redirect()->route('produto')->with('sucess','Removido com sucesso.');
    }
   public function destroyline($id)
    {
         Bannerproduto::destroy($id);

           return back()->with('sucess','Removido com sucesso.');
    }
}
