<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Redirect;

class PromoController 
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
		$data['promo_list'] = DB::select('select a.*, 
                                            b.url_img_banner url_img_banner 
                                        from promo a
                                            left join banner b on a.id_banner=b.id
                                        where a.status=1');
        return view('pages/promo',$data);

    }
}