
@extends('layout.layout_common')


@section('content')
 <div class="signupform">


<div class="wrapper">
  <h2>Login</h2>

  @if($errors->any())

  @foreach ($errors->all() as $item)
      <p style="color: red;">{{$errors}}</p>
  @endforeach
  @endif

  
  @if (Session::has('error'))

  <p style="color: red"> {{Session::has('error')}} </p>   
  @endif
    <form action="{{route('userlogin')}}" method="POST" >

      @csrf
      <div class="input-box">
        <input type="email"  name="email" placeholder="Email" required >
        <i class='bx bxs-envelope'></i>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Password" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="remember-forgot">
        <label><input type="checkbox">Remember Me</label>
        <a href="{{route('forgetpassword')}}">Forgot Password</a>
      </div>
      <input type="submit" value="Login" class="btn">
      <div class="register-link">
        <p>Don't have an account? <a href="{{route('register')}}">Register</a></p>
      </div>
    </form>

  </div>


 </div>


@endsection