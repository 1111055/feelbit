<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prazos;
use App\Http\Requests\PrazosRequest;


class PrazosController extends Controller
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
      $prazos = Prazos::Where('activo','=', '1')->orderby('ordem','asc')->get();

        return view('backend.Prazos.index',compact('prazos'));
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
    public function store(PrazosRequest $request)
    {
         //  $user = Auth::user();
    
        $request->persist();

        return redirect()->route('prazo')->with('sucess','Criado com sucesso.');
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
        $prazos = Prazos::find($id);

       return view('backend.Prazos.edit' , compact('prazos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PrazosRequest $request, $id)
    {
        
        $prazos = Prazos::findOrFail($id);

        $input = $request->all();

       // dd($input);

        $prazos->fill($input)->save();

       
         return redirect()->route('prazo.edit', compact('prazos'))->with('sucess','Guardado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Prazos::destroy($id);

         return redirect()->route('prazo')->with('sucess','Removido com sucesso.');
    }
}
