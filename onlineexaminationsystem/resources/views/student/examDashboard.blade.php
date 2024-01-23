@extends('student.layout')

@section('content')
    
    @if ($success == true)
        @if (count($qnaExams) > 0)
            <h3 class="text-primary text-capitalize mt-5 mb-5"> {{ $message }}</h3> 

            <p class="text-warning"> Answer all questions, choose only one correct Answer
                @php
                $qcount = 1;  
                $options = ['A', 'B', 'C', 'D'];
            @endphp

            @foreach ($questions as $question)
                <p class="text-white">Q{{$qcount ++}}. {{ $question['question'] }}</p>
                
                {{-- Display answers for the current question --}}
                <ol>
                    @php
                        $shuffledAnswers = $question->answer->shuffle();
                    @endphp

                    @foreach ($shuffledAnswers as $index => $answer)
                        <li class="text-white">({{ $options[$index] }}). {{ $answer->answer }}</li>
                    @endforeach
                </ol>
            @endforeach

        @else
            <h3 class="text-danger text-center"> This exam is not available!</h3>
        @endif
    @else
        <h3 class="text-danger text-center"> {{ $message }}</h3> 
    @endif
</div>

@endsection
