<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\BannerLine;
use App\Pagebanner;
use App\Banner;
use App\Pagina;
use App\Produto;
use App\Bannerproduto;
use App\Expressoes;
use App\Familia;
Use Session;
use Mail;
use Analytics;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      
     
      $pagina = Pagina::find(1);
      $banner = PageBanner::getBannerFormPage(1);
                
      foreach ($banner as $key => $value) {

                $_banner = Banner::find($value->id);
               
               if($_banner != null){
                    if($_banner->activo == 1){

                      $bannerline[] = BannerLine::getBannerHome($value->id);

                       
                    }
                
               }
      }

      $paginas = Pagina::where('nome','!=',' ')->orderby("ordem","asc")->get();


       return view('frontend.index',compact('pagina','paginas','bannerline'));
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
