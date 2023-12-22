
@extends('layout.layout_common')


@section('content')
 <div class="signupform">


<div class="wrapper">
  <h2>Forgot Password</h2>

  @if($errors->any())

  @foreach ($errors->all() as $item)
      <p style="color: red;">{{$errors}}</p>
  @endforeach
  @endif

  
  @if (Session::has('success'))

  <p style="color: green"> {{Session::has('success')}} </p>   
  @endif
    <form action="{{route('forgotpassword')}}" method="POST" >

      @csrf
      <div class="input-box">
        <input type="email"  name="email" placeholder="Email" required >
        <i class='bx bxs-envelope'></i>
      </div>

   
      <input type="submit" value="forgot password" class="btn">
      <div class="register-link">
        <p><a href="{{route('login')}}">Login</a></p>
      </div>
    </form>

  </div>


 </div>


@endsection