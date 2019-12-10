<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Familia;
use App\Http\Requests\FamiliaRequest;

class FamiliaController extends Controller
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
         $familia= Familia::
                 orderBy('ordem','asc')->get();


        return view('backend.Familia.index', compact('familia'));
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
    public function store(FamiliaRequest $request)
    {
        $request->persist();

        return redirect()->route('familia')->with('sucess','Criado com sucesso.');
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
         $familia = Familia::find($id);
         return view('backend.Familia.edit', compact('familia'));
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
        $familia = Familia::findOrFail($id);


        //dd($request->all());
        $familia->titulo      = $request->titulo;
        $familia->subtitulo   = $request->subtitulo;
        $familia->ordem       = $request->ordem;
        $familia->activo      = ($request->activo !== '' && $request->activo !== null ) ? 1 : 0;

        $familia->save();

       
         return redirect()->route('familia.edit', compact('familia'))->with('sucess','Guardado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Familia::destroy($id);

         return redirect()->route('familia')->with('sucess','Removido com sucesso.');
    }
}
