<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Mail;

class ProductController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user']= Auth::user();
        $data['banner_list'] = DB::select('select * from banner where status=1');
        $data['product_list'] = DB::select('select * from product where status=1');
        $data['essential_list'] = DB::select('select * from ingredients where status=1 and categories=1');
        $data['sprinkle_list'] = DB::select('select * from ingredients where status=1 and categories=2');
        $data['special_list'] = DB::select('select * from ingredients where status=1 and categories=3');
        $data['house_sauce_list'] = DB::select('select * from ingredients where status=1 and categories=4');
		return view('pages/product',$data);
    }

    public function add_to_cart(Request $request){
        $user = Auth::user();
        if($user!=null){
            $check_order_aktif = DB::select('select * from `order` where status=1 and id_user='.$user->id);
            if($request->all()!=null && $request->input('id_product')==null){
                if($check_order_aktif!=null){
                    $lastInsertOrderDetail=DB::table('order_detail')->insertGetId([
                        "id_order" => $check_order_aktif[0]->id,
                        "id_product" => $request->input('product')
                    ]);
                }else{
                    $lastInsertOrder=DB::table('order')->insertGetId([
                        "status" => 1,
                        "id_user" => $user->id
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
                    DB::beginTransaction();
                    foreach($essential as $value){
                        DB::table('order_ingredients')->insert([
                            "id_order_detail" => $lastInsertOrderDetail,
                            "id_ingredients" => $value
                        ]);
                    }
                    DB::commit();
                }
                
                if($request->input('special_choosed')!=null){
                    DB::beginTransaction();
                    foreach($special as $value){
                        DB::table('order_ingredients')->insert([
                            "id_order_detail" => $lastInsertOrderDetail,
                            "id_ingredients" => $value
                        ]);
                    }
                    DB::commit();
                }
                

                if($request->input('sprinkle_choosed')!=null){
                    DB::beginTransaction();
                    foreach($sprinkle as $value){
                        DB::table('order_ingredients')->insert([
                            "id_order_detail" => $lastInsertOrderDetail,
                            "id_ingredients" => $value
                        ]);
                    }
                    DB::commit();
                }
                

                if($request->input('house_sauce_choosed')!=null){
                    DB::beginTransaction();
                    foreach($house_sauce as $value){
                        DB::table('order_ingredients')->insert([
                            "id_order_detail" => $lastInsertOrderDetail,
                            "id_ingredients" => $value
                        ]);
                    }
                    DB::commit();
                }
            }else{

                if($check_order_aktif!=null){
                    DB::table('order_detail')->insert([
                        "id_order" => $check_order_aktif[0]->id,
                        "id_product" => $request->input('id_product')
                    ]);
                }else{
                    $lastInsertOrder=DB::table('order')->insertGetId([
                        "status" => 1,
                        "id_user" => $user->id
                    ]);

                    $lastInsertOrderDetail=DB::table('order_detail')->insertGetId([
                        "id_order" => $lastInsertOrder,
                        "id_product" => $request->input('id_product')
                    ]);
                }
            }
        }else{
            Redirect::to('/');
        }
    }
}