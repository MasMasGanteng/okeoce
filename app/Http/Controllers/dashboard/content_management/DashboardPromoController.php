<?php

namespace App\Http\Controllers\dashboard\content_management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Redirect;

class DashboardPromoController extends Controller
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
        return view('dashboard/content_management/promo/index');
    }

    public function Post(Request $request)
    {
        $columns = array(
            0 =>'id',            
            1 =>'images',
            2 =>'url_img_banner',
            3 =>'title',
            4 =>'start_date',
            5 =>'end_date',
            6 =>'status',
            7 =>'description',
            8 =>'location',
            9 =>'created_time',
            10 =>'created_by'

        );
        $query='select a.*, b.url_img_banner,
                case 
                    when a.status=0 then "Tidak Aktif"
                    when a.status=1 then "Aktif"
                end status_promo
                from promo a
                    left join banner b on a.id_banner=b.id';
        $totalData = DB::select('select count(1) cnt from promo a
                                    left join banner b on a.id_banner=b.id');
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
            $totalFiltered=DB::select('select count(1) cnt from ('.$query. ' and title like "%'.$search.'%" ) a');
            $totalFiltered=$totalFiltered[0]->cnt;
        }
        $data = array();

        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $show =  $post->id;
                $edit =  $post->id;
                $delete = $post->id;
                $url_edit="/dashboard/promo/create?id=".$edit;
                $url_delete="/dashboard/promo/delete?id=".$delete;
                $nestedData['id'] = $post->id;
                $nestedData['title'] = $post->title;
                $nestedData['url_img_banner'] = $post->url_img_banner;
                $nestedData['images'] = '/uploads/front/banner/'.$post->url_img_banner;
                $nestedData['status'] = $post->status_promo;
                $nestedData['description'] = $post->description;
                $nestedData['location'] = $post->location;
                $nestedData['start_date'] = $post->start_date;
                $nestedData['end_date'] = $post->end_date;
                $nestedData['created_time'] = $post->created_time;
                $nestedData['created_by'] = $post->created_by;
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
        $user = Auth::user();
        if (Auth::check()){
            $data['username'] = $user->name;
            $data['banner_list'] = DB::select('select * from banner');
            $data['id']=$request->input('id');
            if($data['id']!=null){
                $rowData = DB::select('select * from promo where id='.$data['id']);
                $data['title'] = $rowData[0]->title;
                $data['id_banner'] = $rowData[0]->id_banner;
                $data['description'] = $rowData[0]->description;
                $data['status'] = $rowData[0]->status;
                $data['location'] = $rowData[0]->location;
                $data['start_date'] = $rowData[0]->start_date;
                $data['end_date'] = $rowData[0]->end_date;
                $data['created_time'] = $rowData[0]->created_time;
                $data['created_by'] = $rowData[0]->created_by;
                return view('dashboard/content_management/promo/create',$data);
            }else if($data['id']==null){
                $data['title'] = null;
                $data['id_banner'] = null;
                $data['description'] = null;
                $data['status'] = null;
                $data['start_date'] = null;
                $data['end_date'] = null;
                $data['location'] = null;
                $data['created_time'] = null;
                $data['created_by'] = null;
                return view('dashboard/content_management/promo/create',$data);
            }else {
                return Redirect::to('/');
            }
        }else{
            return Redirect::to('/');
        }
    }

    public function post_create(Request $request)
    {

        if ($request->input('id')!=null){
            DB::table('promo')->where('id', $request->input('id'))
            ->update(['title' => $request->input('title-input'),
                'id_banner' => $request->input('select-id_banner-input'),
                'start_date' => $request->input('start_date-input'),
                'end_date' => $request->input('end_date-input'),
                'location' => $request->input('location-input'),
                'description' => $request->input('description-input'),
                'status' => $request->input('select-status-input')
                ]);
        }else{
            DB::table('promo')->insert(
                ['title' => $request->input('title-input'),
                'id_banner' => $request->input('select-id_banner-input'),
                'start_date' => $request->input('start_date-input'),
                'end_date' => $request->input('end_date-input'),
                'location' => $request->input('location-input'),
                'description' => $request->input('description-input'),
                'status' => $request->input('select-status-input'),
                // 'created_by' => Auth::user()->id
                'created_by' => 1
                ]);
        }
    }

    public function delete(Request $request)
    {
        DB::table('promo')->where('id', $request->input('id'))->delete();
        return Redirect::to('/dashboard/promo');
    }
}