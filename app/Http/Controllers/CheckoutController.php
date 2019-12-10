<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProdutoCor;
use App\ProdutoSize;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cart = array();
       if(session()->has('bagone')){

            foreach (session()->get('bagone') as $key => $value) {

                    $color = array();
                    $size  = array();

                   // dd($value['produto']->id);

                    $colorproduto = ProdutoCor::
                             where('produto_id', '=', $value['produto']->id)->orderBy('ordem','asc')->get();

                    if(count($colorproduto) > 0){
                         foreach ($colorproduto as $key => $variabletmp) {

                                     $color[] = array('id' => $variabletmp->cor->id, 'cor' => $variabletmp->cor->titulo);         
                         }
                    }

                     $sizeproduto = ProdutoSize::
                             where('produto_id', '=', $value['produto']->id)->orderBy('ordem','asc')->get();

                    if(count($sizeproduto) > 0){
                         foreach ($sizeproduto as $key => $variabletmp) {

                                     $size[] = array('id' => $variabletmp->size->id, 'size' => $variabletmp->size->tamanho);         
                         }
                    }
               $cart[] = array('produto' => $value, 'colors' => $color, 'sizes' =>  $size);

            }
        }


               
                         
     //  dd($cart);

        return view('frontend.checkout',compact('cart'));
         
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
