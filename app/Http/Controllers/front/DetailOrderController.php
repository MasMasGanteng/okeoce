<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Redirect;

class DetailOrderController 
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
        $data['order'] = DB::select('select * from `order` where status=1 and id_user=1');
        $data['order_product'] = DB::select('
            select 
                b.*,
                a.id id_order_detail
            from order_detail a 
                left join product b on a.id_product=b.id
            where 
                a.id_order='.$data['order'][0]->id);
        $data['order_ingredient_essential'] = DB::select('
            select 
                d.*,
                e.name nama_product,
                b.id order_detail_ref
            from `order` a
                left join order_detail b on b.id_order=a.id
                left join order_ingredients c on c.id_order_detail=b.id
                left join ingredients d on c.id_ingredients=d.id
                left join product e on b.id_product=e.id
            where 
                d.categories=1 and
                a.id='.$data['order'][0]->id);
        $data['order_ingredient_special'] = DB::select('
            select 
                d.*,
                e.name nama_product,
                b.id order_detail_ref
            from `order` a
                left join order_detail b on b.id_order=a.id
                left join order_ingredients c on c.id_order_detail=b.id
                left join ingredients d on c.id_ingredients=d.id
                left join product e on b.id_product=e.id    
            where 
                d.categories=2 and
                a.id='.$data['order'][0]->id);
        $data['order_ingredient_sprinkle'] = DB::select('
            select 
                d.*,
                e.name nama_product,
                b.id order_detail_ref    
            from `order` a
                left join order_detail b on b.id_order=a.id
                left join order_ingredients c on c.id_order_detail=b.id
                left join ingredients d on c.id_ingredients=d.id
                left join product e on b.id_product=e.id
            where 
                d.categories=3 and
                a.id='.$data['order'][0]->id);
        $data['order_ingredient_house_sauce'] = DB::select('
            select 
                d.*,
                e.name nama_product,
                b.id order_detail_ref   
            from `order` a
                left join order_detail b on b.id_order=a.id
                left join order_ingredients c on c.id_order_detail=b.id
                left join ingredients d on c.id_ingredients=d.id
                left join product e on b.id_product=e.id
            where 
                d.categories=4 and
                a.id='.$data['order'][0]->id);
		return view('pages/detail_order', $data);
    }
}