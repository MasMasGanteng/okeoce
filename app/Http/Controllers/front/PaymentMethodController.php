<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Mail;

class PaymentMethodController extends Controller
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
    public function index(Request $request)
    {
        if($request->input('id')!=null){
            $data['id'] = $request->input('id');
            $order = DB::select('select * from `order` where id='.$request->input('id'));
            $data['price'] = 'Rp. '.number_format($order[0]->price,2,",",".");
            return view('pages/payment_method', $data);
        }else{
            return Redirect::to('/error');
        }
    }

    public function post_create(Request $request){
        $user = Auth::user();
        if($request->input('id')!=null){
            DB::table('order')->where('id', $request->input('id'))
            ->update([
                'payment_method' => $request->input('payment_method'),
                'status' => 2
            ]);

            Mail::raw('Order anda sudah kami terima, silahkan melakukan pembayaran dan selanjutnya konfirmasi pembayaran di web.', function ($message) use ($user) {
                $message->from(env('MAIL_USERNAME'), 'Baiza Order');
                $message->to($user->email)->subject('Order sudah diterima');;
            });
        }
    }
}