<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Redirect;

class ProductController 
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
		return view('pages/product');
    }

	// public function map()
	// {
	// 	$data['username'] = '';
	// 	if (Auth::check()) {
	// 		$user = Auth::user();
	// 		$data['username'] = Auth::user()->name;
	// 	}
	// 	return view('google_maps',$data);
	// }

 //    public function logout()
 //    {
 //        Auth::logout();
 //    }

    // public function inbox()
	// {
	// 	$data['user'] = Auth::user();
	// 	$data['pesan'] = DB::select('select a.kode,a.text_pesan,a.tgl_pesan_masuk,concat(b.nama_depan," ",b.nama_belakang) nama from bkt_02030205_pesan a,bkt_02010111_user b where a.kode_user='.$data['user']->id.' and a.kode_user_pengirim=b.id and status=0 order by a.kode desc');
	// 	echo json_encode($data);
	// }

	// public function qs()
	// {
	// 	$user = Auth::user();
	// 	$akses= $user->menu()->where('kode_apps', 5)->get();
	// 	if(count($akses) > 0){
	// 		foreach ($akses as $item) {
	// 			$data['menu'][$item->kode_menu] =  'a' ;
	// 			//if($item->kode_menu==10)
	// 				//$data['detil'][$item->kode_menu_detil]='a';
	// 		}
	// 		if(!empty($data['menu'])){
	// 		    $data['username'] = $user->name;
	// 			return view('QS/main/index',$data);
	// 		}
	// 		else {
	// 			return Redirect::to('/');
	// 		}
	// 	}else{
	// 		return Redirect::to('/');
	// 	}
	// }
}