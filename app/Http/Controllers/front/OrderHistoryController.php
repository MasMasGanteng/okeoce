<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Redirect;

class OrderHistoryController 
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
		return view('pages/order_history');
    }

    public function post(Request $request){

        $user = Auth::user();
        $columns = array(
            0 => 'order_code',
            1 => 'detail_order',
            2 => 'detail_pengiriman',
            3 => 'total'
        );

        $query = "select a.*, b.nama nama_kota, c.nama nama_kec, d.nama nama_kel from `order` a left join kota b on b.kode=a.kode_kota left join kec c on c.kode=a.kode_kec left join kel d on d.kode=a.kode_kel where a.status not in ('0','1') and a.id_user=".$user->id;
        $totalData = DB::select("select count(1) cnt from `order` where status not in ('0','1') and id_user=".$user->id);
        $totalFiltered = $totalData[0]->cnt;
        $limit = $request->input('length');
        $start = $request->input('start');
        // $order = $columns[$request->input('order.0.column')];
        // $dir = $request->input('order.0.dir');
        if(empty($request->input('search.value')))
        {
            $posts=DB::select($query .' order by id desc limit '.$start.','.$limit);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $show =  $post->id;

                $url_edit="/payment_confirmation?id=".$show;
                $nestedData['order_code'] = '<div class="price">'.$post->order_code.'</div>';

                $detail_order = DB::select('
                    select 
                        a.*,
                        b.name,
                        b.price
                    from order_detail a
                        left join product b on b.id=a.id_product
                    where
                        a.id_order='.$show);

                $string_detail_order_makeyourown = '';
                $string_detail_order = '';

                foreach($detail_order as $od){
                    if(in_array($od->id_product, array(3,4))){
                        $special = '';
                        $isi_esential = '';
                        $isi_special = '';
                        $isi_sprinkle = '';
                        $isi_sauce = '';
                        $ingredient_essential = DB::select('select c.name from order_detail a left join order_ingredients b on b.id_order_detail=a.id left join ingredients c on c.id=b.id_ingredients where c.categories=1 and a.id='.$od->id);
                        $count_i=0;
                        foreach($ingredient_essential as $ie){
                            $count_i++;
                            if($count_i==1){
                                $isi_esential .= $ie->name;
                            }else{
                                $isi_esential .=', '.$ie->name;
                            }
                        }
                        $ingredient_special = DB::select('select c.name from order_detail a left join order_ingredients b on b.id_order_detail=a.id left join ingredients c on c.id=b.id_ingredients where c.categories=3 and a.id='.$od->id);
                        $count_i=0;
                        foreach($ingredient_special as $is){
                            $count_i++;
                            if($count_i==1){
                                $isi_special .= $is->name;
                            }else{
                                $isi_special .=', '.$is->name;
                            }
                        }
                        $ingredient_sprinkle = DB::select('select c.name from order_detail a left join order_ingredients b on b.id_order_detail=a.id left join ingredients c on c.id=b.id_ingredients where c.categories=2 and a.id='.$od->id);
                        $count_i=0;
                        foreach($ingredient_sprinkle as $isp){
                            $count_i++;
                            if($count_i==1){
                                $isi_sprinkle .= $isp->name;
                            }else{
                                $isi_sprinkle .=', '.$isp->name;
                            }
                        }
                        $ingredient_sauce = DB::select('select c.name from order_detail a left join order_ingredients b on b.id_order_detail=a.id left join ingredients c on c.id=b.id_ingredients where c.categories=4 and a.id='.$od->id);
                        $count_i=0;
                        foreach($ingredient_sauce as $isa){
                            $count_i++;
                            if($count_i==1){
                                $isi_sauce .= $isa->name;
                            }else{
                                $isi_sauce .=', '.$isa->name;
                            }
                        }
                        if($od->id_product==4){
                            $elemen = '<span>Special : '.$isi_special.'</span>';
                        }
                        $string_detail_order_makeyourown .= '
                            <span>Essentials : '.$isi_esential.'</span>
                            '.$special.'
                            <span>Sprinkle : '.$isi_sprinkle.'</span>
                            <span>House Sauce : '.$isi_sauce.'</span>
                        ';
                    }

                    $string_detail_order .= '
                        <div class="d-flex flex-column mb-2">
                            <span><b>'.$od->name.'</b></span>
                            '.$string_detail_order_makeyourown.'
                            <span>Qty : '.$od->jumlah.'</span>
                            <span>Price : Rp. '.number_format($od->price*$od->jumlah,2,",",".").'</span>
                        </div>';
                }

                $nestedData['detail_order'] = '
                        <div class="mb-3">
                            <span class="text-danger">Date : '.date('d-m-Y',strtotime($post->order_time)).'</span>
                        </div>'.$string_detail_order;
                $nestedData['detail_pengiriman'] = '
                    <div class="d-flex flex-column">
                        <span><b>'.$post->nama_penerima.'</b></span>
                        <span>
                            '.$post->address.'<br>
                            '.$post->nama_kel.', '.$post->nama_kec.', '.$post->nama_kota.'<br>
                        </span>
                        <span>
                            '.$post->phone_number.'
                        </span>
                    </div>';
                $nestedData['total'] = 'Rp. '.number_format($post->price,2,",",".");

                $option = '';
                if($post->status==2){
                    $option .= "<a href='{$url_edit}' class='btn btn-blue btn-block'>Konfirmasi</a>";
                }else if($post->status==3){
                    $option .= "<button class='btn btn-warning btn-block'>On Progress</button>";
                }
                $nestedData['option'] = $option;
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
}