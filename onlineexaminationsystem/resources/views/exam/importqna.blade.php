@extends('admin.dashboard')

@section('content')
    <form action="{{route('import')}}" method="POST" enctype="multipart/form-data">
        @csrf
<div class="mb-5"> 
    <h3 class="btn btn-success">Import Q&A</h3>
</div>
<div class="mb-3">
    <input type="file" name="file" class="form-control " required>
  </div>


  
  
  <button type="submit" class="btn btn-primary">Upload</button>
    </form>

@endsection