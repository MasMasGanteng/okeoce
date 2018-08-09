<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DateTime;
use Formatter;

class PaymentConfirmationController 
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
    public function index(Request $request)
    {
        if($request->input('id')!=null){
            $data['id'] = $request->input('id');
            return view('pages/payment_confirmation', $data);
        }else{
            return Redirect::to('/error');
        }
    }
    
    public function bca_get_token(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://devapi.klikbca.com/api/oauth/token",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "grant_type=client_credentials",
            CURLOPT_HTTPHEADER => array(
            "authorization: Basic YjA5NWFjOWQtMmQyMS00MmEzLWE3MGMtNDc4MWY0NTcwNzA0OmJlZGQxZjhkLTNiZDYtNGQ0YS04Y2I0LWU2MWRiNDE2OTFjOQ==",
            "cache-control: no-cache",
            "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $array = json_decode($response, true);
            $data = json_decode($response);
            $token = $data->access_token;

            date_default_timezone_set('Asia/Jakarta');

            $dateNow = date("Y-m-d");
            $date1 = str_replace('-', '/', $dateNow);
            $StartDate = date('Y-m-d',strtotime($date1 . "-5 days"));
            $EndDate = $dateNow;
            
            $date = date('c');
            $timestamp = substr($date, 0,19).'.000+07:00';

            $api_key = 'dcc99ba6-3b2f-479b-9f85-86a09ccaaacf';
            
            $api_secret = '5e636b16-df7f-4a53-afbe-497e6fe07edc';

            $authorization = 'Bearer '.$token;

            $body = '';
            $body_sexy = strtolower(hash('sha256', $body));

            $create = 'GET:/banking/v3/corporates/h2hauto008/accounts/0613005827/statements?EndDate='.$EndDate.'&StartDate='.$StartDate.':'.$token.':'.$body_sexy.':'.$timestamp;
            
            $signature = hash_hmac('SHA256', $create, $api_secret);
        
            $curl1 = curl_init();

            curl_setopt_array($curl1, array(
                CURLOPT_PORT => "443",
                CURLOPT_URL => "https://devapi.klikbca.com:443/banking/v3/corporates/h2hauto008/accounts/0613005827/statements?EndDate=".$EndDate."&StartDate=".$StartDate,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                "Authorization: ".$authorization,
                "Content-Type: application/json",
                "Origin: baizasushi.com",
                "X-BCA-Key: ".$api_key,
                "X-BCA-Signature: ".$signature,
                "X-BCA-Timestamp: ".$timestamp
                ),
            ));

            $response1 = curl_exec($curl1);
            $err1 = curl_error($curl1);
            
            curl_close($curl1);

            if ($err1) {
                echo "cURL Error #:" . $err1;
            } else {
                // echo 'TOKEN :    ';
                // echo $token;
                // echo '<br>';
                // echo '<br>';
                
                // echo 'STRING :    ';
                // echo $create;
                // echo '<br>';
                // echo '<br>';

                // echo 'SIGNATURE :    ';
                // echo $signature;
                // echo '<br>';
                // echo '<br>';

                // echo $timestamp;
                // echo '<br>';
                // echo '<br>';

                // echo $body_sexy;
                // echo '<br>';
                // echo '<br>';

                // echo $authorization;
                // echo '<br>';
                // echo '<br>';

                // echo $response1;
                // echo '<br>';
                // echo '<br>';

                $content = json_decode($response1);

                foreach($content->Data as $data ){
                    $amount = $data->TransactionAmount;
                    $references = $data->Trailer;

                    if ($request->input('payment_amount')==$amount){
                        DB::table('order')->where('price', $request->input('payment_amount'))->where('id', $request->input('order_id'))
                        ->update(['status' => 3 ]);
                    }
                }
            }
        }

        DB::table('confirmation')->insert([
            'order_id' => $request->input('order_id'),
            'bank' => $request->input('payment_bank'),
            'account' => $request->input('payment_user'),
            'account_number' => $request->input('payment_account_number'),
            'amount' => $request->input('payment_amount'),
            'references' => $request->input('payment_references'),
            'url_img' => $request->input('url_img'),
            'created_by' => Auth::user()->id
        ]);
    }
}