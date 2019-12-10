<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;
use App\Http\Requests\ColorRequest;
class ColorController extends Controller
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
        $color = Color::
                 orderBy('ordem','asc')->get();


        return view('backend.Color.index', compact('color'));
        
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
    public function store(ColorRequest $request)
    {
        $request->persist();

        return redirect()->route('color')->with('sucess','Criado com sucesso.');
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
         $color = Color::find($id);
         return view('backend.Color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ColorRequest $request, $id)
    {

        $color = Color::findOrFail($id);


      // dd($request->activo);
        $color->titulo      = $request->titulo;
        $color->subtitulo   = $request->subtitulo;
        $color->cor         = $request->cor;
        $color->ordem       = $request->ordem;
        $color->activo      = ($request->activo !== '' && $request->activo != null)  ? 1 : 0;

        $color->save();

       
         return redirect()->route('color.edit', compact('color'))->with('sucess','Guardado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Color::destroy($id);

         return redirect()->route('color')->with('sucess','Removido com sucesso.');
    }
}
