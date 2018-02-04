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
        $user = Auth::user();
        $data['order'] = DB::select('select * from `order` where status=1 and id_user='.$user->id);
        if($data['order']!=null){
            $data['id'] =  $data['order'][0]->id;
            $data['nama_penerima'] =  $data['order'][0]->nama_penerima;
            $data['address'] =  $data['order'][0]->address;
            $data['kode_pos'] =  $data['order'][0]->kode_pos;
            $data['phone_number'] =  $data['order'][0]->phone_number;
            $data['kode_kota'] =  $data['order'][0]->kode_kota;
            $data['kode_kec'] =  $data['order'][0]->kode_kec;
            $data['kode_kel'] =  $data['order'][0]->kode_kel;
            $data['up'] =  $data['order'][0]->unique_price;
            $data['order_product'] = DB::select('
                select 
                    b.*,
                    a.id id_order_detail,
                    a.jumlah
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
                    d.categories=3 and
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
                    d.categories=2 and
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
            if($data['order'][0]->kode_kota != null){
                $data['kode_kec_list'] = DB::select('select a.* from kec a left join kota b on b.kode=a.kode_kota where a.kode_kota='.$data['order'][0]->kode_kota);
            }else{
                $data['kode_kec_list'] = [];
            }
            if($data['order'][0]->kode_kec != null){
                $data['kode_kel_list'] = DB::select('select a.* from kel a left join kec b on b.kode=a.kode_kec where a.kode_kec='.$data['order'][0]->kode_kec);
            }else{
                $data['kode_kel_list'] = [];
            }
        }else{
            $data['id'] =  null;
            $data['nama_penerima'] =  null;
            $data['address'] =  null;
            $data['kode_pos'] =  null;
            $data['phone_number'] =  null;
            $data['kode_kota'] =  null;
            $data['kode_kec'] =  null;
            $data['kode_kel'] =  null;
            $data['up'] =  0;
            $data['order_product'] = [];
            $data['order_ingredient_essential'] = [];
            $data['order_ingredient_special'] = [];
            $data['order_ingredient_sprinkle'] = [];
            $data['order_ingredient_house_sauce'] = [];

            $data['kode_kota_list'] = DB::select('select* from kota where kode between 3171 and 3175 order by kode desc');
            $data['kode_kec_list'] = [];
            $data['kode_kel_list'] = [];
        }
        
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

    public function post_create(Request $request){
        if($request->input('id')!=null){
            DB::table('order')->where('id', $request->input('id'))
            ->update([
                'price' => $request->input('total_order_price'),
                'nama_penerima' => $request->input('nama_penerima'),
                'address' => $request->input('address'),
                'kode_pos' => $request->input('kode_pos'),
                'phone_number' => $request->input('phone_number'),
                'kode_kota' => $request->input('select-kode_kota-input'),
                'kode_kec' => $request->input('select-kode_kec-input'),
                'kode_kel' => $request->input('select-kode_kel-input')
            ]);

            $order_detail = DB::select('select * from order_detail where id_order='.$request->input('id'));
            DB::beginTransaction();
            foreach($order_detail as $od){
                DB::table('order_detail')->where('id', $od->id)
                ->update([
                    'jumlah' => intval($request->input('jml'.$od->id))
                ]);
            }
            DB::commit();
            echo $request->input('id');
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