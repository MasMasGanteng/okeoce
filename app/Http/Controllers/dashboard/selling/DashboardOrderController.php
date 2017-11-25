<?php

namespace App\Http\Controllers\dashboard\selling;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Redirect;

class DashboardOrderController
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
        return view('dashboard/order/index');
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
        $query='select * from banner';
        $totalData = DB::select('select count(1) cnt from banner');
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
                $url_edit="/dashboard/banner/create?id=".$edit;
                $url_delete="/dashboard/banner/delete?id=".$edit;
                $nestedData['id'] = $post->id;
                $nestedData['title'] = $post->title;
                $nestedData['url_img_banner'] = $post->url_img_banner;
                $nestedData['description'] = $post->description;
                $nestedData['status'] = $post->status;
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
                $rowData = DB::select('select * from banner where id='.$data['id']);
                $data['title'] = $rowData[0]->title;
                $data['url_img_banner'] = $rowData[0]->url_img_banner;
                $data['description'] = $rowData[0]->description;
                $data['status'] = $rowData[0]->status;
                $data['created_time'] = $rowData[0]->created_time;
                $data['created_by'] = $rowData[0]->created_by;
                return view('dashboard/order/create',$data);
            }else if($data['id']==null){
                $data['title'] = null;
                $data['url_img_banner'] = null;
                $data['description'] = null;
                $data['status'] = null;
                $data['created_time'] = null;
                $data['created_by'] = null;
                return view('dashboard/order/create',$data);
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