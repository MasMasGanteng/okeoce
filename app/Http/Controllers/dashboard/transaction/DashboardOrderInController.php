<?php

namespace App\Http\Controllers\dashboard\transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Redirect;

class DashboardOrderInController extends Controller
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
        return view('dashboard/transaction/order_in/index');
    }

    public function Post(Request $request)
    {
        $columns = array(
            0 =>'id',
            1 =>'status',
            2 =>'id_user',
            3 =>'price',
            4 =>'payment_method',
            5 =>'shipping_method',
            6 =>'nama_penerima',
            7 =>'address',
            8 =>'phone_number',
            9 =>'order_time'

        );
        $query='select * from (
                    select 
                        a.*,
                        case 
                            when a.status = "0" then "Canceled"
                            when a.status = "1" then "On Cart"
                            when a.status = "2" then "Pending"
                            when a.status = "3" then "Confirmed Payment"
                            when a.status = "4" then "Proceed"
                            when a.status = "5" then "Done"
                       end status_convert,
                       b.name
                    from `order` a 
                        left join users b on a.id_user = b.id
                    where a.status = "2") b';
        $totalData = DB::select('select count(1) cnt from `order` a 
                                    left join users b on a.id_user = b.id
                                where a.status = "2"');
        $totalFiltered = $totalData[0]->cnt;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if(empty($request->input('search.value')))
        {
            $posts=DB::select($query .' order by '.$order.' '.$dir.' limit '.$start.','.$limit);
        }
        else {
            $search = $request->input('search.value');
            $posts=DB::select($query. ' where (
                nama like "%'.$search.'%"
                )
                order by '.$order.' '.$dir.' limit '.$start.','.$limit);
            $totalFiltered=DB::select('select count(1) cnt from ('.$query. ' where (
                nama like "%'.$search.'%" 
                )) a');
            $totalFiltered=$totalFiltered[0]->cnt;
        }

        $data = array();

        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $edit =  $post->id;
                $url_show="/dashboard/order_in/create?id=".$edit;
                $url_edit="/dashboard/order_in/create?id=".$edit;
                $url_delete="/dashboard/order_in/delete?id=".$edit;
                $nestedData['id'] = $post->id;
                $nestedData['status'] = $post->status_convert;
                $nestedData['id_user'] = $post->name;
                $nestedData['price'] = $post->price;
                $nestedData['payment_method'] = $post->payment_method;
                $nestedData['shipping_method'] = $post->shipping_method;
                $nestedData['nama_penerima'] = $post->nama_penerima;
                $nestedData['address'] = $post->address;
                $nestedData['phone_number'] = $post->phone_number;
                $nestedData['order_time'] = $post->order_time;
                $nestedData['option'] = "&emsp;<a href='{$url_show}' title='show' ><span class='fa fa-fw fa-search'></span></a>
                                            &emsp;<a href='{$url_edit}' title='EDIT' ><span class='fa fa-fw fa-edit'></span></a>
                                            &emsp;<a href='#' onclick='delete_func(\"{$url_delete}\");'><span class='fa fa-fw fa-trash-o'></span></a>";
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

            $data['kode_kota_list'] = DB::select('select* from kota where kode between 3171 and 3175 order by kode desc');
            $data['kode_kec_list'] = [];
            $data['kode_kel_list'] = [];
            $data['kode_kota'] = null;
            $data['kode_kec'] = null;
            $data['kode_kel'] = null;
            $data['price'] = $rowData[0]->price;
        return view('dashboard/transaction/order_in/create', $data);
        }
    }

    public function post_create(Request $request)
    {
        if ($request->input('id')!=null){
            DB::table('banner')->where('id', $request->input('id'))
            ->update(['title' => $request->input('title-input'),
                'url_img_banner' => $url_img_banner,
                'description' => $request->input('description-input'),
                'status' => $request->input('status-input')
                ]);
        }else{
            DB::table('banner')->insert(
                ['title' => $request->input('title-input'),
                'url_img_banner' => $url_img_banner,
                'description' => $request->input('description-input'),
                'status' => $request->input('status-input'),
                'created_by' => Auth::user()->id
                ]);
        }
    }

    public function delete(Request $request)
    {
        DB::table('banner')->where('id', $request->input('id'))->delete();
        return Redirect::to('/dashboard/order');
    }
}