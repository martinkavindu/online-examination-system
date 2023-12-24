@extends('admin.dashboard')


@section('content')

<form method="post" action="{{ route('storeqna') }}">
  @csrf
  <label for="question" class="text-white">Question:</label>
  <textarea name="question" id="question" required class="form-control" placeholder="Enter the Question"></textarea>

  <label for="answers" class="text-white">Answers:</label>
  <div id="answers-container">
      <div class="answer-input" class="form-control">
          <input type="text" name="answers[][answer]" placeholder="Enter answer" required>
          <label class="text-white">
              <input type="checkbox" name="answers[][is_correct]">
              Correct Answer
          </label>
      </div>
  </div>
  <div class="mt-5">
  <button type="button" onclick="addAnswer()" class="btn btn-primary">Add Answer</button>

  <button type="submit" class="btn btn-success">Create Q&A</button>
  </div>
</form>

    
@endsection