<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subfamilia;
use App\Familia;
use App\Http\Requests\SubfamiliaRequest;


class SubfamiliaController extends Controller
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
        
         $subfamilia= Subfamilia::
                 orderBy('ordem','asc')->get();

      
        return view('backend.Subfamilia.index', compact('subfamilia'));
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
    public function store(SubfamiliaRequest $request)
    {
        $request->persist();

        return redirect()->route('subfamilia')->with('sucess','Criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
      $subfamilia = Subfamilia::find($id);

      $familia = Familia::
                 where('titulo', '!=', '')
                 ->orderBy('ordem','asc')->get();


       $selfam = $familia->pluck('titulo','id');

       
       $selfam->prepend('-- Escolha uma Familia -- ',0);


         return view('backend.Subfamilia.edit', compact('subfamilia','selfam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubfamiliaRequest $request, $id)
    {
        $subfamilia = Subfamilia::findOrFail($id);


        $subfamilia->titulo        = $request->titulo;
        $subfamilia->subtitulo     = $request->subtitulo;
        $subfamilia->ordem         = $request->ordem;
        $subfamilia->familia_id    = $request->familia_id;
        $subfamilia->activo        = ($request->activo !== '' && $request->activo !== null ) ? 1 : 0;

        $subfamilia->save();

       
        return redirect()->route('subfamilia.edit', compact('subfamilia'))->with('sucess','Guardado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Subfamilia::destroy($id);

         return redirect()->route('subfamilia')->with('sucess','Removido com sucesso.');
    }
}
