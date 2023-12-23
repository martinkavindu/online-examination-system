@extends('admin.dashboard')


@section('content')

<form method="post" action="{{ route('storeq&a') }}">
  @csrf
  <label for="question">Question:</label>
  <textarea name="question" id="question" required class="form-control"></textarea>

  <label for="answers">Answers:</label>
  <div id="answers-container">
      <div class="answer-input" class="form-control">
          <input type="text" name="answers[][answer]" placeholder="Enter answer" required>
          <label>
              <input type="checkbox" name="answers[][is_correct]">
              Correct Answer
          </label>
      </div>
  </div>
  
  <button type="button" onclick="addAnswer()">Add Answer</button>

  <button type="submit">Create Question</button>
</form>

    
@endsection