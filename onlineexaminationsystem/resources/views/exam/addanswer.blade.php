@extends('admin.dashboard')

@section('content')
    <form action="{{route('storeanswer')}}" method="POST">
        @csrf
<div class="mb-5"> 
    <h3 class="btn btn-success"> Add Answers</h3>
</div>

  <div class="mb-3">
    <select type="text" class="form-control form-select" id="question_id" name="question_id"required>
<option value="">Select Question</option>

@foreach($questions as $id => $name)
<option value="{{ $id }}">
  {{ $name }}
</option>
@endforeach

    </select>
  </div>
  <div class="mb-3">
  
    <label for="answers" class="text-white">Answers:</label>
  </div>
  
  <div  class="mb-3">
    <div class="form-group">
      @for($i = 1; $i <= 4; $i++)
          <label for="answer{{ $i }}" class="text-white">Option {{ $i }}</label>
          <input type="text" name="answers[{{ $i }}][text]" id="answer{{ $i }}" class="form-control" required>
          <input type="radio" name="correct_answer" value="{{ $i }}" required> Correct Answer<br>
      @endfor
  </div>
  
  
</div>
<div class="mt-5">
  >
    <button type="submit" class="btn btn-success"> Save answer</button>
</div>
    </form>

@endsection