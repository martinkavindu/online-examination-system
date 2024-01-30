<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Exam;
use Mail;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;

class AuthController extends Controller
{
  public  function loadingRegister(){

    if(Auth::user() && Auth::user()->is_admin == 1){
      return redirect('/admin/dashboard');
    } 
    elseif(Auth::user() && Auth::user()->is_admin == 0) {
      
      return redirect('/dashboard');

    }

    return view('register');
  }

  public function studentRegister(Request $request){

    $request->validate([

        'name' =>'string|required|min:2',
        'email' =>'string|email|required|max:100|unique:users',
        'password'=>'string|required|confirmed|min:8',
    ]);

    $user = new User;

    $user->name =$request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);

    $user->save();

    return redirect('/login')->with('message','Registration was successful');

  }

  public function loadingLogin(){

    if(Auth::user() && Auth::user()->is_admin == 1){
      return redirect('/admin/dashboard');
    } 
    elseif(Auth::user() && Auth::user()->is_admin == 0) {
      
      return redirect('/dashboard');

    }

    return view('login');
  }

  public function userLogin (Request $request){

    $userCredential = $request->only('email','password');

    if(Auth::attempt($userCredential)){

      if(Auth::user()->is_admin == 1){
        return redirect('/admin/dashboard');
      }else
      {
        return redirect('/dashboard');
      }

    }
    else{
      return back()->with('error','Email or password incorrect');
    }
  }
  //students methods
    public function  Dashboard(){
$exams = Exam::with('subjects')->orderBy('date')->get();

      return view('student.dashboard',['exams'=>$exams]);
    }

    public function AdminDashboard(){
 
      return view('admin.dashboard');
    }

 

    public function Logout (Request $request){

      $request->session()->flush();
      Auth::logout();
      return redirect('/login');
    }

    public function ForgetPassword(){
      return view('forgotpassword');
    }

    public function ForgotPassword(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->get();
    
            if (count($user) > 0) {
                $token = Str::random(40);
                $domain = URL::to('/');
                $url = $domain.'/reset-password?token='.$token;
    
                $data['url'] = $url;
                $data['email'] = $request->email;
                $data['title'] = 'password reset';
                $data['body'] = 'please click on link below to reset your password';
    
                $dateTime = now(); // Define $dateTime before using it
    
                Mail::send('forgetPasswordMail', ['data' => $data], function ($message) use ($data, $request, $dateTime) {
                    $message->to($data['email'])->subject($data['title']);
    
                    PasswordReset::updateOrCreate(
                        [
                            'email' => $request->email,
                        ],
                        [
                            'email' => $request->email,
                            'token' => $token,
                            'created_at' => $dateTime,
                        ]
                    );
    
                    return back()->with('success', 'Please check your email to reset your password');
                });
            } else {
                return back()->with('error', 'Email does not exist');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    
}
