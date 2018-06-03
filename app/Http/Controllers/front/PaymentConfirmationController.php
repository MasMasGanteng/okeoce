<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bca;
use Redirect;

class PaymentConfirmationController 
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
    public function index(Request $request)
    {
        if($request->input('id')!=null){
            $data['id'] = $request->input('id');
            return view('pages/payment_confirmation', $data);
        }else{
            return Redirect::to('/error');
        }
    }
    
    public function bca_check(Request $request)
    {
        
            // Request Login dan dapatkan nilai OAUTH
            $response = \Bca::httpAuth();

            // LIHAT HASIL OUTPUT
            echo json_encode($response);
    }
    
}