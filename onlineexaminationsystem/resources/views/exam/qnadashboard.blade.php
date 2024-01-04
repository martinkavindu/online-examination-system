@extends('admin.dashboard')

@section('content')

<div class="qsn">
    <form action="{{route('storeqna')}}" method="POST">
        @csrf

        <label for="question" class="text-white">Question:</label>
        <textarea name="question" id="question" required class="form-control" placeholder="Enter the Question"></textarea>

        <label for="answers" class="text-white">Answers:</label>
        <div id="answers-container">
            <div class="answer-input">
                <input type="text" name="answer[]" placeholder="Enter answer" required>
                <label class="text-white">
                    <input type="radio" name='is_correct' class="is_correct">
                    Correct Answer
                </label>
            </div>
        </div>

        <div class="mt-5">
            <button type="button" onclick="addAnswer()" class="btn btn-primary">Add Answer</button>
            <button type="submit" class="btn btn-success">Create Q&A</button>
        </div>
    </form>
</div>

@endsection
