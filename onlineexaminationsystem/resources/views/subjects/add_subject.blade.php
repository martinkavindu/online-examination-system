@extends('admin.dashboard')

@section('content')
    <form action="{{route('storesubject')}}" method="post">
        @csrf
<div class="mb-5"> 
    <h3 class="btn btn-success"> Add Subject</h3>
</div>
<div class="mb-5">
    <label for="" class="text-white mb-3">Enter New Subject</label>
    <input type="text" class="form-control" id="subject_name" name="subject_name" placeholder="Subject" required>
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection