@extends('admin.dashboard')

@section('content')
    <form action="{{route('storeqsn')}}" method="POST">
        @csrf
<div class="mb-5"> 
    <h3 class="btn btn-success"> Add Question</h3>
</div>
<div class="mb-5">
    <label for="" class="text-white mb-3">Enter New Question</label>
    <input type="text" class="form-control" id="question" name="question" placeholder="Enter question" required>
  </div>

  <div class="mb-5">
    <label for="" class="text-white mb-3">Explanation</label>
     <textarea name="explanation" class="w-100" placeholder="Enter question explanation (optional)"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection