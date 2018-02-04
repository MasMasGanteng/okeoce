<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Redirect;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$user = Auth::user();
        if ($user->flag_admin == 1) {
            $data['transaction'] = DB::select('select count(*) cnt from `order` where order_time = now()');
            $data['cnt_transaction'] = $data['transaction'][0]->cnt;

            $data['user'] = DB::select('select count(*) cnt from `users` where status = "1" and created_at = now()');
            $data['cnt_user'] = $data['user'][0]->cnt;

            $data['pending'] = DB::select('select count(*) cnt from `order` where status = "2" and order_time = now()');
            $data['cnt_pending'] = $data['pending'][0]->cnt;

            $data['new'] = DB::select('select count(*) cnt from `order` where status = "3" and order_time = now()');
            $data['cnt_new'] = $data['new'][0]->cnt;

            $data['progress'] = DB::select('select count(*) cnt from `order` where status = "4" and order_time = now()');
            $data['cnt_progress'] = $data['progress'][0]->cnt;

            $data['success'] = DB::select('select count(*) cnt from `order` where status = "5" and order_time = now()');
            $data['cnt_success'] = $data['success'][0]->cnt;

            $data['cancel'] = DB::select('select count(*) cnt from `order` where status = "6" and order_time = now()');
            $data['cnt_cancel'] = $data['cancel'][0]->cnt;
            

            $data['make'] = DB::select('select count(*) cnt from `ingredients` where status = "1"');
            $data['cnt_make'] = $data['make'][0]->cnt;

            $data['ready'] = DB::select('select count(*) cnt from `product` where status = "1"');
            $data['cnt_ready'] = $data['transaction'][0]->cnt;

            return view('dashboard/index', $data);
        }else{
            return Redirect::to('/');
        }
    }
}
