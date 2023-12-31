@extends('admin.dashboard')

@section('content')
    <form action="{{route('storestudent')}}" method="post">
        @csrf
<div class="mb-5"> 
    <h3 class="btn btn-success"> Add Students</h3>
</div>
<div class="mb-3">
    <input type="text" class="form-control " id="name" name="name" placeholder="Enter Student Name" required>
  </div>
  <div class="mb-3">
  
    <input type="email" class="form-control " id="email" name="email" placeholder="Enter student email" required>
  </div>
  
  <div class="mb-3">

    <input type="password" class="form-control " id="password" name="password" placeholder="Create password" required>
  </div>

  <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection