
@extends('layout.layout_common')


@section('content')
 <div class="signupform">


<div class="wrapper">
  <h2>Register</h2>

  @if($errors->any())

  @foreach ($errors->all() as $item)
      <p style="color: red;">{{$error}}</p>
  @endforeach
  @endif
    <form action="{{route('studentregister')}}" method="POST" >

      @csrf
    
      <div class="input-box">
        <input type="text" name="name"  placeholder="Username" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="email"  name="email" placeholder="Email" required >
        <i class='bx bxs-envelope'></i>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Password" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="input-box">
        <input type="password" name= "password_confirmation" placeholder="confirm password" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <input type="submit" value="register" class="btn">
      <div class="register-link">
        <p>Already have an account? <a href="{{route('login')}}">Login</a></p>
      </div>
    </form>

    @if (Session::has('success'))

    <p style="color: green;"> {{Session::has('success')}} </p>   
    @endif
  </div>


 </div>


@endsection