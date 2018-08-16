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
        $totalData = DB::select('select count(1) cnt from confirmation order by status asc');
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
                $nestedData['option'] = "<a href='#' onclick='approve_func(\"{$post->id}\");' class='btn btn-sm btn-info'><span class='fa fa-fw fa-pencil'></span></a>&nbsp;<a href='#' onclick='delete_func(\"{$url_delete}\");' class='btn btn-sm btn-danger'><span class='fa fa-fw fa-close'></span></a>";
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

    public function post_create(Request $request)
    {
        if ($request->input('id')!=null){
            DB::table('order')->where('id', $request->input('id'))
            ->update(['status' => 4 ]);
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