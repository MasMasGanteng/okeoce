<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['essential_list'] = DB::select('select * from ingredients where status=1');
        $data['sprinkle_list'] = DB::select('select * from ingredients where status=2');
        $data['house_sauce_list'] = DB::select('select * from ingredients where status=3');
        $data['special_list'] = DB::select('select * from ingredients where status=4');
		return view('pages/home',$data);
    }
}