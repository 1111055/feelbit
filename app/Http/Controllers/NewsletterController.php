<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;
use App\Http\Requests\NewsletterRequest;
use App\Mail\NovaNewsletter;
use Mail;

class NewsletterController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['teste']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $newsletter = Newsletter::orderby('created_at','desc')->get();

        return view('backend.Newsletter.index', compact('newsletter'));
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
    public function store(NewsletterRequest $request)
    {

        $request->persist();
    
        return view('backend.Social.social', compact('social'));
    }

    public function teste(NewsletterRequest $request)
    {
       

        $email = $request->email;

        $exist = Newsletter::where('email','=',$email)->get();
        if( count($exist) < 1){

         
          Mail::to($email)->cc("marcomendes0202@hotmail.com")->send(new NovaNewsletter($request));
          $request->persist();
          return response()
            ->json(['done' => '1']);

        }else{

          return response()
            ->json(['done' => '0']);
        }
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
