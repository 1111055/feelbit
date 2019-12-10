<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategoria;
use App\Categoria;
use App\Http\Requests\SubcategoriaRequest;

class SubcategoriaController extends Controller
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
        $subcategoria= Subcategoria::
                 orderBy('ordem','asc')->get();


        return view('backend.Subcategoria.index', compact('subcategoria'));
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
    public function store(SubcategoriaRequest $request)
    {
        $request->persist();

        return redirect()->route('subcategoria')->with('sucess','Criado com sucesso.');
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


         $subcategoria = Subcategoria::find($id);

         $selcat = Categoria::getSelection();


         return view('backend.Subcategoria.edit', compact('subcategoria','selcat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubcategoriaRequest $request, $id)
    {
         $subcategoria = Subcategoria::findOrFail($id);


        //dd($request->all());
        $subcategoria->titulo        = $request->titulo;
        $subcategoria->subtitulo     = $request->subtitulo;
        $subcategoria->ordem         = $request->ordem;
        $subcategoria->categoria_id  = $request->categoria_id;
        $subcategoria->activo        = ($request->activo !== '' && $request->activo !== null ) ? 1 : 0;

        $subcategoria->save();

       
         return redirect()->route('subcategoria.edit', compact('subcategoria'))->with('sucess','Guardado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Subcategoria::destroy($id);

         return redirect()->route('subcategoria')->with('sucess','Removido com sucesso.');
    }
}
