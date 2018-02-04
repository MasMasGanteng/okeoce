<?php

namespace App\Http\Controllers\dashboard\add_product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Redirect;

class DashboardReadyToEatController extends Controller
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
        return view('dashboard/add_product/ready_to_eat/index');
    }

    public function post(Request $request)
    {
        $columns = array(
            0 =>'id',
            1 =>'name',
            2 =>'url_img_product',
            3 =>'images',
            5 =>'price',
            7 =>'description',
            8 =>'status',
            9 =>'created_time',
            10 =>'created_by'

        );
        $query='select *,
                    case 
                        when status = 1 then "Aktif"
                        when status = 0 then "Tidak Aktif"
                    end status
                from product
                where id not in ("3", "4")';
        $totalData = DB::select('select count(1) cnt from product
                where id not in ("3", "4")');
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
            $posts=DB::select($query. ' and name like "%'.$search.'%"  order by '.$order.' '.$dir.' limit '.$start.','.$limit);
            $totalFiltered=DB::select('select count(1) cnt from ('.$query. ' and name like "%'.$search.'%" ) a');
            $totalFiltered=$totalFiltered[0]->cnt;
        }

        $data = array();

        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $edit =  $post->id;
                $url_edit="/dashboard/ready_to_eat/create?id=".$edit;
                $url_delete="/dashboard/ready_to_eat/delete?id=".$edit;
                $nestedData['id'] = $post->id;
                $nestedData['name'] = $post->name;
                $nestedData['url_img_product'] = $post->url_img_product;
                $nestedData['images'] = '/uploads/product/product/'.$post->url_img_product;
                $nestedData['price'] = $post->price;
                $nestedData['status'] = $post->status;
                $nestedData['description'] = $post->description;
                $nestedData['created_time'] = $post->created_time;
                $nestedData['created_by'] = $post->created_time;
                $nestedData['option'] = "<a href='{$url_edit}' title='EDIT' class='btn btn-sm btn-info'><span class='fa fa-fw fa-pencil'></span></a>&nbsp;<a href='#' onclick='delete_func(\"{$url_delete}\");' class='btn btn-sm btn-danger'><span class='fa fa-fw fa-close'></span></a>";
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
        $user = Auth::user();
        if (Auth::check()){
            $data['username'] = $user->name;
            $data['id']=$request->input('id');
            if($data['id']!=null){
                $rowData = DB::select('select * from product where id='.$data['id']);
                $data['name'] = $rowData[0]->name;
                $data['url_img_product'] = $rowData[0]->url_img_product;
                $data['price'] = $rowData[0]->price;
                $data['description'] = $rowData[0]->description;
                $data['status'] = $rowData[0]->status;
                $data['created_time'] = $rowData[0]->created_time;
                $data['created_by'] = $rowData[0]->created_by;
                return view('dashboard/add_product/ready_to_eat/create',$data);
            }else if($data['id']==null){
                $data['name'] = null;
                $data['url_img_product'] = null;
                $data['price'] = null;
                $data['description'] = null;
                $data['status'] = null;
                $data['created_time'] = null;
                $data['created_by'] = null;
                return view('dashboard/add_product/ready_to_eat/create',$data);
            }else {
                return Redirect::to('/');
            }
        }else{
            return Redirect::to('/');
        }
    }

    public function post_create(Request $request)
    {   
        $file_product = $request->file('url_img_product-input');
        $url_img_product = null;
        $upload_product = false;
        if($request->input('url_img_product-file') != null && $file_product == null){
            $url_img_product = $request->input('url_img_product-file');
            $upload_product = false;
        }elseif($request->input('url_img_product-file') != null && $file_product != null){
            $url_img_product = $file_product->getClientOriginalName();
            $upload_product = true;
        }elseif($request->input('url_img_product-file') == null && $file_product != null){
            $url_img_product = $file_product->getClientOriginalName();
            $upload_product = true;
        }

        if ($request->input('id')!=null){
            DB::table('product')->where('id', $request->input('id'))
            ->update(['name' => $request->input('name-input'),
                'url_img_product' => $url_img_product,
                'price' => $request->input('price-input'),
                'status' => $request->input('select-status-input'),
                'description' => $request->input('description-input')
                ]);
            if($upload_product == true){
                $file_product->move(public_path('/uploads/product/product'), $file_product->getClientOriginalName());
            }
        }else{
            DB::table('product')->insert(
                ['name' => $request->input('name-input'),
                'url_img_product' => $url_img_product,
                'price' => $request->input('price-input'),
                'status' => $request->input('select-status-input'),
                'description' => $request->input('description-input')
                //'created_by' => Auth::user()->id
                ]);
            if($upload_product == true){
                $file_product->move(public_path('/uploads/product/product'), $file_product->getClientOriginalName());
            }
        }
    }

    public function delete(Request $request)
    {
        DB::table('product')->where('id', $request->input('id'))->delete();
        return Redirect::to('/dashboard/ready_to_eat');
    }
}