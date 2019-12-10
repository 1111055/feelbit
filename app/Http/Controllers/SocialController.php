<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Social;
use App\Http\Requests\SocialRequest;

class SocialController extends Controller
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



        $social = Social::
                 orderBy('ordem','asc')->get();


        return view('backend.Social.social', compact('social'));
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
    public function store(SocialRequest $request)
    {
        
     //  $user = Auth::user();
    
        $request->persist();

        return redirect()->route('social')->with('sucess','Criado com sucesso.');
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

        $social = Social::find($id);

       return view('backend.Social.editsocial' , compact('social'));
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
        $social = Social::find($id);


        $social->nome=$request->nome;
        $social->class=$request->class;
        $social->link=$request->link;
        $social->menomonica=$request->menomonica;
        $social->ordem=$request->ordem;
        $social->activo=$request->activo == null ? 0 : 1;


        $social->save();



     
        return redirect()->route('social.edit',$id)->with('sucess','Guardado com sucesso.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Social::destroy($id);

         return redirect()->route('social')->with('sucess','Removido com sucesso.');
    }
}
