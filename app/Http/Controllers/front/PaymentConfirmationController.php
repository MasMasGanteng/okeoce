<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Redirect;

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
            "authorization: Basic YjY2OTI1ZGUtZDhlYy00NzZlLWExNzAtNmNmMDZjODYzYjc4OmVmYzcxY2VkLWIwZTctNGI0Ny04MjcwLTNjMjQ4Mjk3NjRhYQ==",
            "cache-control: no-cache",
            "content-type: application/x-www-form-urlencoded",
            "postman-token: f2c6fde4-e6fd-1e5d-d587-c3d0f69db601"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $array = json_decode($response, true);
            // $token = var_dump($array['access_token']);
            // return Redirect::to('/phayment_confirmation/check_mutasi', $token);

            $data = json_decode($response);
            $token = $data->access_token;

            date_default_timezone_set('Asia/Jakarta');
            $timestamp = date('c');
            $StartDate = "2018-06-01";
            $EndDate = "2018-06-03";

            $create = 'GET:/banking/v3/corporates/h2hauto009/accounts/0353202038/statements?StartDate='.$StartDate.'&EndDate='.$EndDate.':'.$token.':e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855:'.$timestamp;
            

            $signature = hash_hmac('sha256', 'GET:/banking/v3/corporates/h2hauto009/accounts/0353202038/statements?StartDate='.$StartDate.'&EndDate='.$EndDate.':'.$token.':e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855:'.$timestamp, 'f6068d37-0fd8-456a-bced-61ac35af53da');

            // $create = 'GET:/banking/v3/corporates/h2hauto009/accounts/0353202038/statements?EndDate='.$EndDate.'&StartDate='.$StartDate.':'.$token.':Lowercase(HexEncode(SHA-256(RequestBody))):'.$timestamp;
            

            // $signature= hash_hmac('sha256', 'GET:/banking/v3/corporates/h2hauto009/accounts/0353202038/statements?EndDate='.$EndDate.'&StartDate='.$StartDate.':'.$token.':Lowercase(HexEncode(SHA-256(RequestBody))):'.$timestamp, 'f6068d37-0fd8-456a-bced-61ac35af53da');

            $sha256 = 'Lowercase(HexEncode(SHA-256(RequestBody)))';


            $authorization = 'Bearer '.$token;

            // echo $response;
            echo $token;
            // echo $timestamp;
            echo $create;
            // echo $signature;
            // echo $sha256;
            // echo $authorization;
        
            $curl1 = curl_init();

            curl_setopt_array($curl1, array(
                CURLOPT_PORT => "443",
                CURLOPT_URL => "https://devapi.klikbca.com:443/banking/v3/corporates/h2hauto009/accounts/0353202038/statements?StartDate=2018-06-01&EndDate=2018-06-21",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer ".$token,
                "Content-Type: application/json",
                "Origin: baizasushi.com",
                "X-BCA-Key: 34bec438-9911-494c-9e29-d0041f941eec",
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
              echo $response1;
            }
        }
    }
}