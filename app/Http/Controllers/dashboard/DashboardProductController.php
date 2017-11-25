<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Mail;

class DashboardProductController
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
        return view('dashboard/product/index');
    }

    public function create()
    {
        return view('dashboard/product/create');
    }
}