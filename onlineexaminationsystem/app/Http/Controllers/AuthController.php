<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
  public  function loadingRegister(){

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

    return back()->with('message','Registration was successful');

  }

  public function loadingLogin(){

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
    public function  Dashboard(){

      return view('student.dashboard');
    }

    public function AdminDashboard(){

      return view('admin.dashboard');
    }

    public function Logout (Request $request){

      $request->session()->flush();
      Auth::logout();
      return redirect('/login');
    }
}
