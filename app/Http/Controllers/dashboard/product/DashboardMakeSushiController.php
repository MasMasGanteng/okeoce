<?php

namespace App\Http\Controllers\dashboard\product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Redirect;

class DashboardMakeSushiController
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
        return view('dashboard/make_sushi/index');
    }

    public function Post(Request $request)
    {
        $columns = array(
            0 =>'id',
            1 =>'title',
            2 =>'url_img_banner',
            3 =>'description',
            4 =>'status',
            5 =>'created_time',
            6 =>'created_by'

        );
        $query='select * from ingredients';
        $totalData = DB::select('select count(1) cnt from ingredients');
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
            $posts=DB::select($query. ' and title like "%'.$search.'%"  order by '.$order.' '.$dir.' limit '.$start.','.$limit);
            $totalFiltered=DB::select('select count(1) cnt from ('.$query. ' and nama like "%'.$search.'%" ) a');
            $totalFiltered=$totalFiltered[0]->cnt;
        }

        $data = array();

        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $edit =  $post->id;
                $url_edit="/dashboard/make_sushi/create?id=".$edit;
                $url_delete="/dashboard/make_sushi/delete?id=".$edit;
                $nestedData['id'] = $post->id;
                $nestedData['name'] = $post->name;
                $nestedData['url_img_banner'] = $post->url_img_banner;
                $nestedData['description'] = $post->description;
                $nestedData['status'] = $post->status;
                $nestedData['price'] = $post->price;
                $nestedData['stock'] = $post->stock;
                $nestedData['created_time'] = $post->created_time;
                $nestedData['created_by'] = $post->created_time;
                $nestedData['option'] = "&emsp;<a href='{$url_edit}' title='EDIT' ><span class='fa fa-fw fa-edit'></span></a>
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
        // $user = Auth::user();
        // if (Auth::check()){
        //     $data['username'] = $user->name;
            $data['id']=$request->input('id');
            if($data['id']!=null){
                $rowData = DB::select('select * from ingredients where id='.$data['id']);
                $data['name'] = $rowData[0]->name;
                $data['url_img_banner'] = $rowData[0]->url_img_banner;
                $data['description'] = $rowData[0]->description;
                $data['status'] = $rowData[0]->status;
                $data['price'] = $rowData[0]->price;
                $data['stock'] = $rowData[0]->stock;
                $data['created_time'] = $rowData[0]->created_time;
                $data['created_by'] = $rowData[0]->created_by;
                return view('dashboard/make_sushi/create',$data);
            }else if($data['id']==null){
                $data['name'] = null;
                $data['url_img_banner'] = null;
                $data['description'] = null;
                $data['status'] = null;
                $data['price'] = null;
                $data['stock'] = null;
                $data['created_time'] = null;
                $data['created_by'] = null;
                return view('dashboard/make_sushi/create',$data);
            }
        //     }else {
        //         return Redirect::to('/');
        //     }
        // }else{
        //     return Redirect::to('/');
        // }
    }

    public function post_create(Request $request)
    {   
        $file_banner = $request->file('url_img_banner-input');
        $url_img_banner = null;
        $upload_banner = false;
        if($request->input('url_img_banner-file') != null && $file_banner == null){
            $url_img_banner = $request->input('url_img_banner-file');
            $upload_banner = false;
        }elseif($request->input('url_img_banner-file') != null && $file_banner != null){
            $url_img_banner = $file_banner->getClientOriginalName();
            $upload_banner = true;
        }elseif($request->input('url_img_banner-file') == null && $file_banner != null){
            $url_img_banner = $file_banner->getClientOriginalName();
            $upload_banner = true;
        }

        if ($request->input('id')!=null){
            DB::table('ingredients')->where('id', $request->input('id'))
            ->update(['name' => $request->input('name-input'),
                'url_img_banner' => $url_img_banner,
                'description' => $request->input('description-input'),
                'price' => $request->input('price-input'),
                'stock' => $request->input('stock-input'),
                'status' => $request->input('status-input')
                ]);
            if($upload_banner == true){
                $file_banner->move(public_path('/uploads/product/ingredients'), $file_banner->getClientOriginalName());
            }
        }else{
            DB::table('ingredients')->insert(
                ['name' => $request->input('name-input'),
                'url_img_banner' => $url_img_banner,
                'description' => $request->input('description-input'),
                'price' => $request->input('price-input'),
                'stock' => $request->input('stock-input'),
                'status' => $request->input('status-input'),
                'created_by' => Auth::user()->id
                ]);
            if($upload_banner == true){
                $file_banner->move(public_path('/uploads/product/ingredients'), $file_banner->getClientOriginalName());
            }
        }
    }

    public function delete(Request $request)
    {
        DB::table('ingredients')->where('id', $request->input('id'))->delete();
        return Redirect::to('/dashboard/make_sushi');
    }
}