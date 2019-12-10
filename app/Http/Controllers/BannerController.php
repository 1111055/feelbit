<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\BannerLine;
use App\Categoria;
use App\Http\Requests\BannerRequest;

class BannerController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::where('produto','=','0')->
                 orderBy('ordem','asc')->get();


        return view('backend.Banner.index', compact('banner'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $request->persist();

        return redirect()->route('banner')->with('sucess','Criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $banner = Banner::find($id);
         $bannerLine = BannerLine::where('idbannner','=',$id)->orderBy('ordem','asc')->get();
 
          $selcat    = Categoria::getSelection();


         return view('backend.Banner.edit', compact('banner','bannerLine','selcat'));
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
        $banner = Banner::findOrFail($id);


     //   dd($request->all());
        $banner->titulo      = $request->titulo;
        $banner->descricao   = $request->descricao;
        $banner->ordem       = $request->ordem;
        if($request->has('width')){
          $banner->width       = $request->width;
          $banner->height      = $request->height;
        }
        $banner->activo      = $request->has('activo') && $request->activo !== '' ? 1 : 0;

        $banner->save();

       
         return redirect()->route('banner.edit', compact('banner'))->with('sucess','Guardado com sucesso.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::destroy($id);

         return redirect()->route('banner')->with('sucess','Removido com sucesso.');
    }
}
