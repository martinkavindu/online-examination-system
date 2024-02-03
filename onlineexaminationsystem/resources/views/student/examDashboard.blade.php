

@extends('student.layout', ['qcount' => $qcount])

@section('content')
@php
    $time = explode(':', $qnaExams[0]['time']);
@endphp

<div class="container">
    <h3 class="text-white">Welcome, <i class="fa-regular fa-user pe-2"></i>{{ Auth::user()->name }}</h3>

    <h6 class="text-white"> Subject: {{$qnaExams[0]['subject_name']}}  </h6>
    <h3 class="text-primary text-capitalize">{{$qnaExams[0]['exam_name']}}</h3>

    @php $qcount = 1; @endphp

    @if ($success == true)
        @if (count($qnaExams) > 0)
            <h3 class="text-primary text-end time" colspan="8"> Exam time: {{ $qnaExams[0]['time'] }}Hrs</h3>

            <!-- Countdown Timer -->
            <div id="countdown" class="text-danger text-end"> </div>

            <form action="{{ route('examsubmit') }}" method="POST" onsubmit="return isValid()" id="exam_form">
                @csrf
                <input type="hidden" name="exam_id" value="{{ $qnaExams[0]['id'] }}"/>

                <p class="text-warning">Answer all questions, choose only one correct Answer
                    @php $options = ['A', 'B', 'C', 'D']; @endphp
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
                        <input type="submit" class="btn btn-info"/>
                    </div>
                </div>
            </form>
        @else
            <h3 class="text-danger text-center">This exam is not available!</h3>
        @endif
    @else
        <h3 class="text-danger text-center">{{ $message }}</h3>
    @endif
</div>

<!-- JavaScript for Countdown Timer -->
<script>
    var examEndTime = new Date();
    examEndTime.setHours(examEndTime.getHours() + {{ $time[0] }});
    examEndTime.setMinutes(examEndTime.getMinutes() + {{ $time[1] }});

    function updateCountdown() {
        var now = new Date();
        var timeLeft = examEndTime - now;

        var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

        document.getElementById("countdown").innerHTML = hours + "h " + minutes + "m " + seconds + "s ";

        if (timeLeft < 0) {
            document.getElementById("exam_form").submit();
        } else {
            setTimeout(updateCountdown, 1000);
        }
    }

    updateCountdown();
</script>
@endsection
