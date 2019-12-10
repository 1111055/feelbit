<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(session()->has('wish')){

            foreach (session()->get('wish') as $key => $value) {
                if($value->path != null){
                     $firstname = explode('/', trim($value->path));
                    if (!file_exists(public_path('/img/Produtos/CROP/'.last($firstname)))) {

                             $value->path = request()->root().'/img/Produtos/CROP/noimage.png';
                     }
               }else{
                         $value->path = request()->root().'/img/Produtos/CROP/noimage.png';
               }
            }
        }


       if(session()->has('bagone')){

            foreach (session()->get('bagone') as $key => $value) {
                if($value['produto']->path != null){
                     $firstname = explode('/', trim( $value['produto']->path));
                    if (!file_exists(public_path('/img/Produtos/CROP/'.last($firstname)))) {

                              $value['produto']->path = request()->root().'/img/Produtos/CROP/noimage.png';
                     }
               }else{
                          $value['produto']->path = request()->root().'/img/Produtos/CROP/noimage.png';
               }
            }
        }

      
        return view('frontend.wish');
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
    public function store(Request $request)
    {
        //
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
