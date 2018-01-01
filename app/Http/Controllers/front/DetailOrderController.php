<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Redirect;

class DetailOrderController extends Controller
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

        $data['kode_kota_list'] = DB::select('select* from kota where kode between 3171 and 3175 order by kode desc');
        $data['kode_kec_list'] = [];
        $data['kode_kel_list'] = [];
        $data['kode_kota'] = null;
        $data['kode_kec'] = null;
        $data['kode_kel'] = null;
		return view('pages/detail_order', $data);
    }

    public function select(Request $request)
    {
        if(($request->input('kec'))!=null){
            $kec = DB::select('select kode, nama from kec where kode_kota='.$request->input('kec'));
            echo json_encode($kec);
        }
        elseif(($request->input('kel'))!=null){
            $kel = DB::select('select kode, nama from kel where kode_kec='.$request->input('kel'));
            echo json_encode($kel);
        }
    }

    public function delete(Request $request)
    {
        $check = DB::select('
            select 
                c.name nama_product,
                b.*  
            from order_detail b 
                left join product c on b.id_product=c.id
            where 
                b.id='.$request->input('id'));
        if($check[0]->nama_product=="Roll Kecil" || $check[0]->nama_product=="Roll Besar"){
            DB::table('order_ingredients')->where('id_order_detail', $request->input('id'))->delete();
        }

        DB::table('order_detail')->where('id', $request->input('id'))->delete();
        return Redirect::to('/detail_order');
    }
}