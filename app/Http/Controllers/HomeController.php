<?php

namespace App\Http\Controllers;

use App\Alert;
use App\Register;
use App\Vehicle;
use App\ExpenseType;
use Illuminate\Http\Request;
use app\User;
class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('admin.dashboard');
    }
}
