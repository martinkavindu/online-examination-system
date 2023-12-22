@extends('admin.dashboard')

@section('content')
    <form action="{{route('updatesubject',$subjects->id)}}" method="post">
        @csrf
<div class="mb-5"> 
    <h3 class="btn btn-success">Update Subject</h3>
</div>
<div class="mb-5">
    <label for="" class="text-white mb-3">Subject</label>
    <input type="text" class="form-control" id="subject_name" name="subject_name" placeholder="Subject" required value="{{$subjects->subject_name}}">
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection