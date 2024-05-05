<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Exam;
use App\Models\Payments;
use Illuminate\Support\Facades\Log;
use Mail;
use Illuminate\Support\Facades\DB;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;

class studentController extends Controller
{
    public function paidExam(){
        $exams = Exam::where('plan',1)->with(['subjects','payments'])->orderBy('date','DESC')->get();

        return view('student.paid_exam',['exams'=>$exams]);
        
    }


    public function Mpesapay(Request $request)
    {
        $consumerKey = 'qlmgrxQ65aK2GJ9AqXtYW6EOFfGpn1MfPwKu0IlUSQtelM5d';
        $consumerSecret = '1AhL9GA4i1sYlHo4xB26RMePFw3I4GiJClAGW2JEycfvY0J1jV3LhudTrl9J46Vs';
    
        $authUrl = "https://sandbox.safaricom.co.ke/oauth/v1/generate";
    
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode($consumerKey . ':' . $consumerSecret),
            'Content-Type' => 'application/json',
        ])->get($authUrl, [
            'grant_type' => 'client_credentials',
        ]);
    
        $response_body = $response->getBody()->getContents();
    
        if ($response->failed()) {
            return [
                'success' => false,
                'message' => 'Error: ' . $response->body(),
            ];
        }
    
        $authResponseData = $response->json();
        $access_token = $authResponseData['access_token'];
        $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $timestamp = Carbon::rawParse('now')->format('YmdHms');

        $password = base64_encode("174379" . $passkey . $timestamp);

       
    
        $stkpush ="https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $access_token,
            'Content-Type' => 'application/json',
        ])->post($stkpush, [
            "BusinessShortCode" => "174379",
            "Password" => $password,  
            "Timestamp" => $timestamp,  
            "TransactionType" => "CustomerPayBillOnline",
            "Amount" =>"1",
            "PartyA"=> "254700729827",
            "PartyB" => "174379",
            "PhoneNumber"=> "254700729827",
            "CallBackURL" => "https://worthy-lamprey-adapting.ngrok-free.app/mpesa/callback",
            "AccountReference" => "Test",
            "TransactionDesc" => "Test"
        ]);
    
        return redirect()->route('paidexams')->with('message', 'Check your mpesa to enter pin to complete the transaction');
    }
    

    public function callback(Request $request)
    {
       
        $data = $request->all();
        Log::info('Callback data received:', $data);
 
    DB::table('mpesadata')->insert([
    'transaction_id' => $data['TransID'],
    'amount'     => $data['TransAmount']
    ]);

       
        return response()->json(['success' => true]);
    }
    
}
