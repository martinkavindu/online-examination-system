@extends('student.layout')

@section('content')
    @php $qcount =1; @endphp
    @if ($success == true)
        @if (count($qnaExams) > 0)
        <form action="" method="POST" onsubmit="return isValid()">
            <input type="hidden" name="exam_id" value="{{$qnaExams[0]['id']}}"/>
            <h3 class="text-primary text-capitalize mt-5 mb-5"> {{ $message }}</h3> 

            <p class="text-warning"> Answer all questions, choose only one correct Answer
                @php
                $qcount = 1;  
                $options = ['A', 'B', 'C', 'D'];
            @endphp
<div>
            @foreach ($questions as $question)
                <p class="text-white">Q{{$qcount ++}}. {{ $question['question'] }}</p>
                <input type="hidden" name="q[]" value="{{$question['id']}}"/>

                <input type="hidden" name="ans_{{$qcount-1}}" id="ans_{{$qcount-1}}"/>
                {{-- Display answers for the current question --}}
                <ol>
                    @php
                        $shuffledAnswers = $question->answer->shuffle();
                    @endphp

                    @foreach ($shuffledAnswers as $index => $answer)
                        <li class="text-white">({{ $options[$index] }}). {{ $answer->answer }}
                            <input type="radio" name="radio_{{$qcount-1}}" data-id="{{$qcount-1}}" value="{{$answer->id}}" class="select_ans"/>
                        
                        </li>
                     
                    @endforeach
                </ol>

</div>
            @endforeach

            <div class="text-center">
                <input type="submit" class=" btn btn-info" />
            </div>

            </form>
        @else
            <h3 class="text-danger text-center"> This exam is not available!</h3>
        @endif
    @else
        <h3 class="text-danger text-center"> {{ $message }}</h3> 
    @endif
</div>

@endsection
