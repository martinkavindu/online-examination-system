@extends('student.layout')

@section('content')
    
<div class="container"> 
    <h6 class="text-white text-capitalize"> Welcome, {{ Auth::user()->name }}. All the best</h6>

    @if ($success == true)
    @if (count($qnaExams) > 0)
    {{-- <h2 class="text-center text-primary text-capitalize">{{ $qnaExam->exam_name }}</h2> --}}

    @foreach ($questions as $question)
{{--   
        <p>{{ $exam->id }}</p> --}}
        <p>{{ $question['id'] }}</p>
        <p>{{ $question['question'] }}</p>
     
 
@endforeach
        @else
            <h3 class="text-danger text-center"> This exam is not available!</h3>
        @endif
    @else
        <h3 class="text-danger text-center"> {{ $message }}</h3> 
    @endif
</div>

@endsection
