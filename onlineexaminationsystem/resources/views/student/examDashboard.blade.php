@extends('student.layout')

@section('content')
    
<div class="container"> 

    <h6 class="text-white text-capitalize"> Welcome, {{Auth::user()->name}}. All the best</h6>

        <h2 class="text-center text-primary text-capitalize">
            {{$exam[0]['exam_name']}}
        </h2>

        <div> 

            @if ($sucess == true)
                
            @else
            <h3 class="text-danger text-center"> {{$message}}</h3> 
                
            @endif
        </div>
</div>


@endsection