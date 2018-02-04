<?php

namespace App\Http\Controllers\dashboard\content_management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Redirect;

class DashboardFaqController extends Controller
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
        return view('dashboard/content_management/faq/index');
    }

    public function Post(Request $request)
    {
        $columns = array(
            0 =>'id',            
            1 =>'ask',
            2 =>'question',
            3 =>'status'
        );
        $query='select *,
                case 
                    when status=0 then "Tidak Aktif"
                    when status=1 then "Aktif"
                end status_faq
                from faq';
        $totalData = DB::select('select count(1) cnt from faq');
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
                $url_edit="/dashboard/faq/create?id=".$edit;
                $url_delete="/dashboard/faq/delete?id=".$delete;
                $nestedData['id'] = $post->id;
                $nestedData['ask'] = $post->ask;
                $nestedData['question'] = $post->question;
                $nestedData['status'] = $post->status_faq;
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
                $rowData = DB::select('select * from faq where id='.$data['id']);
                $data['ask'] = $rowData[0]->ask;
                $data['question'] = $rowData[0]->question;
                $data['status'] = $rowData[0]->status;
                return view('dashboard/content_management/faq/create',$data);
            }else if($data['id']==null){
                $data['ask'] = null;
                $data['question'] = null;
                $data['status'] = null;
                return view('dashboard/content_management/faq/create',$data);
            }else {
                return Redirect::to('/');
            }
        }else{
            return Redirect::to('/');
        }
    }

    public function post_create(Request $request)
    {
        $user = Auth::user();
        var_dump($request->all());
        if ($request->input('id')!=null){
            DB::table('faq')->where('id', $request->input('id'))
            ->update(['ask' => $request->input('ask'),
                'question' => $request->input('question'),
                'status' => $request->input('select-status-input')
                ]);
        }else{
            DB::table('faq')->insert(
                ['ask' => $request->input('ask'),
                'question' => $request->input('question'),
                'status' => $request->input('select-status-input'),
                // 'created_by' => Auth::user()->id
                'created_by' => $user->id
                ]);
        }
    }

    public function delete(Request $request)
    {
        DB::table('faq')->where('id', $request->input('id'))->delete();
        return Redirect::to('/dashboard/faq');
    }
}