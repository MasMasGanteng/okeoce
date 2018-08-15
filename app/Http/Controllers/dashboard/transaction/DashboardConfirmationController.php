<?php

namespace App\Http\Controllers\dashboard\transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Redirect;

class DashboardConfirmationController extends Controller
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
            return view('dashboard/transaction/confirmation/index');
        }else{
            return Redirect::to('/');
        }
    }

    public function Post(Request $request)
    {
        $columns = array(
            0 =>'id',
            1 =>'order_id',
            2 =>'bank',
            3 =>'account_number',
            4 =>'amount'

        );
        $query='select *, case when status is null then "Need Confirmation" when status = 1 then "Confirmed" end status_convert from confirmation order by status asc';
        $totalData = DB::select('select count(1) cnt from confirmation');
        $totalFiltered = $totalData[0]->cnt;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if(empty($request->input('search.value')))
        {
            $posts=DB::select($query .', '.$order.' '.$dir.' limit '.$start.','.$limit);
        }
        else {
            $search = $request->input('search.value');
            $posts=DB::select($query. ' where (
                id like "%'.$search.'%" or
                order_id like "%'.$search.'%" or
                bank like "%'.$search.'%" or
                account_number like "%'.$search.'%" or
                amount like "%'.$search.'%"
                )
                order by '.$order.' '.$dir.' limit '.$start.','.$limit);
            $totalFiltered=DB::select('select count(1) cnt from ('.$query. ' where (
                id like "%'.$search.'%" or
                order_id like "%'.$search.'%" or
                bank like "%'.$search.'%" or
                account_number like "%'.$search.'%" or
                amount like "%'.$search.'%"
                )) a');
            $totalFiltered=$totalFiltered[0]->cnt;
        }

        $data = array();

        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $edit =  $post->order_id;
                $url_show="/dashboard/confirmation/create?id=".$edit;
                $url_edit="/dashboard/confirmation/create?id=".$edit;
                $url_delete="/dashboard/confirmation/delete?id=".$edit;

                $nestedData['id'] = $post->id;
                $nestedData['order_id'] = $post->order_id;
                $nestedData['bank'] = $post->bank;
                $nestedData['account_no'] = $post->account_number;
                $nestedData['amount'] = $post->amount;
                $nestedData['references'] = $post->references;
                $nestedData['status'] = $post->status_convert;
                $nestedData['url_img'] = $post->url_img;
                
                if($post->status!=1){
                    $nestedData['option'] = "
                        &emsp;<a href='{$url_show}' class='btn btn-sm btn-info'><span class='fa fa-fw fa-pencil'></span></span></a>
                        &nbsp;<a href='#' onclick='delete_func(\"{$url_delete}\");' class='btn btn-sm btn-danger'><span class='fa fa-fw fa-close'></span></a>";
                }else{
                    $nestedData['option'] = "
                        &nbsp;<a href='#' onclick='delete_func(\"{$url_delete}\");' class='btn btn-sm btn-danger'><span class='fa fa-fw fa-close'></span></a>";
                }
                
                $data[] = $nestedData;
            }
        }

        $json_data = array(
                    "draw"            => intval($request->input('draw')),
                    "recordsTotal"    => intval($totalData[0]->cnt),
                    "recordsFiltered" => intval($totalFiltered),
                    "data"            => $data
                    );

        echo json_encode($json_data);
    }

    public function create(Request $request)
    {   
        $data['id']=$request->input('id');
        if($data['id']!=null){
            $rowData = DB::select('select * from `order` where id='.$data['id']);
            $data['order'] = DB::select('select * from `order` where id='.$data['id']);
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
            $data['kode_kota'] = $rowData[0]->kode_kota;
            $data['kode_kec'] = $rowData[0]->kode_kec;
            $data['kode_kel'] = $rowData[0]->kode_kel;
            $data['address'] = $rowData[0]->address;
            $data['kode_pos'] = $rowData[0]->kode_pos;
            $data['phone_number'] = $rowData[0]->phone_number;
            $data['nama_penerima'] = $rowData[0]->nama_penerima;
            $data['kode_kota_list'] = DB::select('select * from kota where kode ='.$rowData[0]->kode_kota);
            $data['kode_kec_list'] = DB::select('select * from kec where kode ='.$rowData[0]->kode_kec);
            $data['kode_kel_list'] = DB::select('select * from kel where kode ='.$rowData[0]->kode_kel);;
            $data['price'] = $rowData[0]->price;
        return view('dashboard/transaction/confirmation/create', $data);
        }
    }

    public function post_create(Request $request)
    {
        if ($request->input('id')!=null){
            DB::table('order')->where('id', $request->input('id'))
            ->update(['status' => 3 ]);
        }
    }

    public function delete(Request $request)
    {
        DB::table('confirmation')->where('id', $request->input('id'))->delete();
        return Redirect::to('/dashboard/confirmation');
    }

    public function update(Request $request)
    {
        DB::table('order')->where('id', $request->input('id'))
            ->update(['status' => 1]);
        return Redirect::to('/dashboard/confirmation');
    }
}