<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Analytics\Period;
use Analytics;
use App\Newsletter;
use App\Contacto;
class DashController extends Controller
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
        $user = Auth::user();
        $news = Newsletter::count();
        $contacto = Contacto::count();

       // dd($contacto);
        
        $analyticsData = Analytics::fetchMostVisitedPages(Period::months(6),1);
        $analyticsmost = Analytics::fetchMostVisitedPages(Period::months(6),4);
        $analytic = Analytics::getAnalyticsService();

        $analyticshoje = Analytics::fetchVisitorsAndPageViews(Period::days(0));

        $mostview = $analyticsData->toArray();
        $mostviewmany = $analyticsmost->toArray();
        $mostviewtoday = $analyticshoje->toArray();
       // $userstype = Analytics::fetchUserTypes(Period::days(6));

        $teste = Analytics::UsersDevice(Period::days(6));
       // $now = Analytics::activenow(Period::days(6));
        $countrys = Analytics::UsersCountry(Period::days(6))->take(3);

        $month = Analytics::UsersByMonth(Period::months(6));


      //  dd($month);
        $user->authorizeRoles(['master', 'supermaster']);
        return view('backend.index',compact('mostview','mostviewmany','mostviewtoday','teste','news','contacto','countrys'));
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

    public function piechart()
    {
      
      $teste = Analytics::UsersDevice(Period::days(6));
       
      $Data = array();

     

      foreach ($teste as $key => $value) {

          //dd($value);
          $color = ""; 
          //dd($key);
          switch ($key) {
                case 0:
                        $color = "#f56954";
                    break;
                case 1:
                        $color = "#00a65a";
                    break;
                case 2:
                        $color = "#f39c12";
                    break;
                case 3:
                        $color = "#00c0ef";
                    break;
                 case 4:
                        $color = "#00c9ef";
                    break;
            }

           $Data[] = array('value' => $value['usersnumber'], 'color' => $color  ,'highlight' => $color , 'label' => $value['typedevice']);



      }
        return response()
            ->json($Data);
    }

      public function mapschar()
    {
      
      $teste = Analytics::UsersCountry(Period::days(6));
       
      $Data = array();

     

      foreach ($teste as $key => $value) {

           $Data[] = array('latLng' => [39.399872, -8.224454], 'name' => $value['type']);



      }
        return response()
            ->json($Data);
    }

    public function userschar()
    {
      
      $teste = Analytics::UsersByMonth(Period::months(6));
       
      $Meses = array();
      $valores = array();
      $Data = array();


    /*  label               : 'Digital Goods',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : [28, 48, 40, 19, 86, 27, 90]*/

     

      foreach ($teste as $key => $value) {


           $valores[] = $value['users'];
            $Meses[]  = $value['mes'];


      }
       $Data[] = array('meses' =>  $Meses, 'valores' =>  $valores );
        return response()
            ->json($Data);
    }

}
