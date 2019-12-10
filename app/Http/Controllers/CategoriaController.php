<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Categoria;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
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
        $categoria= Categoria::
                 orderBy('ordem','asc')->get();


        return view('backend.Categoria.index', compact('categoria'));
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
    public function store(CategoriaRequest $request)
    {
        $request->persist();

        return redirect()->route('categoria')->with('sucess','Criado com sucesso.');
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
         $categoria = Categoria::find($id);
         return view('backend.Categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaRequest $request, $id)
    {
        $categoria = Categoria::findOrFail($id);


        //dd($request->all());
        $categoria->titulo      = $request->titulo;
        $categoria->subtitulo   = $request->subtitulo;
        $categoria->ordem       = $request->ordem;
        $categoria->activo      = ($request->activo !== '' && $request->activo !== null ) ? 1 : 0;

        $categoria->save();

       
         return redirect()->route('categoria.edit', compact('categoria'))->with('sucess','Guardado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Categoria::destroy($id);

         return redirect()->route('categoria')->with('sucess','Removido com sucesso.');
    }
}
