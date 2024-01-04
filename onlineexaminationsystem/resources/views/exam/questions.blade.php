@extends('admin.dashboard')

@section('content')
    <form action="{{ route('storeqnaexam') }}" method="POST">
        @csrf

        <div class="mb-5">
            <h3 class="btn btn-success"> Add questions to exam</h3>
        </div>

        <div class="mb-3">
            <input type="hidden" class="form-control" id="exam_id" name="exam_id" value="{{ $exam->id }}">
    

        </div>
        <div class="mb-3">
        <label class="text-white"> Select questions</label>
        </div>
        <div class="container mb-3">
            <label class="text-white">Select questions</label>
            <select class="form-control form-select" name="question_id[]" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="20" onchange="console.log(this.selectedOptions)">
                @foreach ($questions as $question)
                    <option value="{{ $question->id }}">{{ $question->question }}</option>
                @endforeach
            </select>
        </div>
        

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
