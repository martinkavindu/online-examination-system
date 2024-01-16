@extends('student.layout')

@section('content')
    
<div class="container"> 

    <h6 class="text-white text-capitalize"> Welcome, {{Auth::user()->name}}. All the best</h6>

        <h2 class="text-center text-primary text-capitalize">
            {{$exam[0]['exam_name']}}
        </h2>

        <div> 

            @if ($success == true)
            @if (count($qna) > 0)
               @foreach($qna as $data)
               
               <h5>Q. {{$data['question'][0]['questions']}}</h5>
               @endforeach
           @else
           <h3 class="text-danger text-center"> Questions and Answers not available! </h3> 
            @endif
                
            @else
            <h3 class="text-danger text-center"> {{$message}}</h3> 
                
            @endif
        </div>
</div>

@endsection