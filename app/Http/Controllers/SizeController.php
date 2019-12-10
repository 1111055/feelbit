<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Size;
use App\Http\Requests\SizeRequest;


class SizeController extends Controller
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
        $size = Size::
                 orderBy('ordem','asc')->get();


        return view('backend.Size.index', compact('size'));
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
    public function store(SizeRequest $request)
    {
         $request->persist();

        return redirect()->route('size')->with('sucess','Criado com sucesso.');
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
         $size = Size::find($id);
         return view('backend.Size.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SizeRequest $request, $id)
    {
         $size = Size::findOrFail($id);

        $size->titulo      = $request->titulo;
        $size->subtitulo   = $request->subtitulo;
        $size->tamanho     = $request->tamanho;
        $size->ordem       = $request->ordem;
        $size->activo       = ($request->size !== '' && $request->activo != null)  ? 1 : 0;

        $size->save();

       
         return redirect()->route('size.edit', compact('size'))->with('sucess','Guardado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          Size::destroy($id);

         return redirect()->route('size')->with('sucess','Removido com sucesso.');
    }
}
