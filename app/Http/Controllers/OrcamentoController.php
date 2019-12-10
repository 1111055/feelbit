<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orcamento;
use App\Orcamentoline;
use App\Http\Requests\OrcamentoRequest;
use Illuminate\Support\Facades\Storage;
use File;
use Carbon\Carbon;
use Response;
use Mail;
use App\Mail\PedidoOrcamento;

class OrcamentoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $orcamento =  Orcamento::orderBy('created_at','desc')->get();

        return view('backend.Orcamento.index', compact('orcamento'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrcamentoRequest $request)
    {
 
        $filename = "";

            $uploadPath = public_path('orcamento');
           
            if (! file_exists($uploadPath)) {
                mkdir($uploadPath, 0775);
              
            }


          if($request->hasFile('fileToUpload')) {


                    $photo = $request->file('fileToUpload');
                   
                    $filenamewithextension = $photo->getClientOriginalName();
             
                    $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
             
                    $extension = $photo->getClientOriginalExtension();
             
                    $imagename = Carbon::now().'.'.$extension ; 

                   // $photo->move(public_path("\orcamento"), $imagename);   

                 // $photo->storeAs(null, $imagename, 'upload');
                    //Storage::disk('orcamento')->put("orcamento", $photo);
                  //  $path = $photo->store('orcamento');
                    $filename = time() . '-' . $photo->getClientOriginalName();
                   // $photo->move($uploadPath, $filename);
                    $file = $request->file('fileToUpload')->storeAs('orcamento', $filename, 'upload');
          }


                
       
        $data =   $request->persist($filename);
      

        $produto = $request->prod;
        $cor     = $request->cor;
        $size    = $request->size;
        $qtd     = $request->quantidade;
        $qtd     = $request->quantidade;

        if(count($produto) > 0){

            foreach ($produto as $key => $value) {
              Orcamentoline::create([
                'produto_id'     => $value,
                'color_id'       => $cor[$key],
                'size_id'        => $size[$key],
                'quantidade'     => $qtd[$key],
                'orcamento_id'   => $data->id 
              ]);
            }

        }
          
         //  Mail::to($request->email)->cc("marcomendes0202@hotmail.com")->send(new PedidoOrcamento($request));

           //dd($request->email);


         Mail::to($request->email)->send(new PedidoOrcamento($request));
         Mail::to('marcomendes999@gmail.com')->send(new PedidoOrcamento($request));

          
          return response()
            ->json(['done' => '1']);

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      

       $orcamento =  Orcamento::find($id);


         foreach ($orcamento->getOrcamentolines  as $key => $valuetmp) {

                  if($valuetmp->produto->path != null){
                     $firstname = explode('/', trim($valuetmp->produto->path));
                    if (!file_exists(public_path('/img/Produtos/CROP/'.last($firstname)))) {

                             $valuetmp->produto->path = request()->root().'/img/Produtos/CROP/noimage.png';
                     }
                  }else{
                             $valuetmp->produto->path = request()->root().'/img/Produtos/CROP/noimage.png';
                  }
              
        }
 
        return view('backend.Orcamento.show', compact('orcamento'));
    }

    /**
     * Show the form for e diting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    public function getDownload($namefile,$id)
    {
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/logotipo/orcamento/".$namefile;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        return Response::download($file, 'orcamento_'.$id.'.pdf', $headers);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
