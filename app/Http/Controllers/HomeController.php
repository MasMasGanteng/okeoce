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
        $data['essential_list'] = DB::select('select * from ingredients where status=1 and categories=1');
        $data['special_list'] = DB::select('select * from ingredients where status=1 and categories=2');
        $data['sprinkle_list'] = DB::select('select * from ingredients where status=1 and categories=3');
        $data['house_sauce_list'] = DB::select('select * from ingredients where status=1 and categories=4');
		return view('pages/home',$data);
    }

    public function add_to_cart(Request $request){
        $check_order_aktif = DB::select('select * from `order` where status=1 and id_user=1');
        if($request->all()!=null){
            if($check_order_aktif!=null){
                $lastInsertOrderDetail=DB::table('order_detail')->insertGetId([
                    "id_order" => $check_order_aktif[0]->id,
                    "id_product" => $request->input('product')
                ]);
            }else{
                $lastInsertOrder=DB::table('order')->insertGetId([
                    "status" => 1,
                    "id_user" => 1
                ]);

                $lastInsertOrderDetail=DB::table('order_detail')->insertGetId([
                    "id_order" => $lastInsertOrder,
                    "id_product" => $request->input('product')
                ]);
            }

            $essential=$request->input('essential_choosed');
            $special=$request->input('special_choosed');
            $sprinkle=$request->input('sprinkle_choosed');
            $house_sauce=$request->input('house_sauce_choosed');

            if($request->input('essential_choosed')!=null){

            }
            DB::beginTransaction();
            foreach($essential as $value){
                DB::table('order_ingredients')->insert([
                    "id_order_detail" => $lastInsertOrderDetail,
                    "id_ingredients" => $value,
                    "status" => 0,
                ]);
            }
            DB::commit();

            if($request->input('special_choosed')!=null){
                DB::beginTransaction();
                foreach($special as $value){
                    DB::table('order_ingredients')->insert([
                        "id_order_detail" => $lastInsertOrderDetail,
                        "id_ingredients" => $value,
                        "status" => 0,
                    ]);
                }
                DB::commit();
            }
            

            if($request->input('sprinkle_choosed')!=null){
                DB::beginTransaction();
                foreach($sprinkle as $value){
                    DB::table('order_ingredients')->insert([
                        "id_order_detail" => $lastInsertOrderDetail,
                        "id_ingredients" => $value,
                        "status" => 0,
                    ]);
                }
                DB::commit();
            }
            

            if($request->input('house_sauce_choosed')!=null){
                DB::beginTransaction();
                foreach($house_sauce as $value){
                    DB::table('order_ingredients')->insert([
                        "id_order_detail" => $lastInsertOrderDetail,
                        "id_ingredients" => $value,
                        "status" => 0,
                    ]);
                }
                DB::commit();
            }
            
            
        }
    }
}