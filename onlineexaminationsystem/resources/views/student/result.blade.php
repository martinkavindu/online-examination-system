@extends('student.layout')

@section('content')

 <h2>Results</h2>


 <div class="container">

<div class="table-responsive">


    <table class="table table-striped table-bordered">
<thead>
    <tr>
    <th>S/N</th>
    <th>Exam</th>
    <th>Result</th>
    <th> Status</th>

    </tr>
</thead>

   <tbody>
@if (count($attempt)>0)
@php $x = 1; @endphp

@foreach ($attempt as $item)
<tr>
    <td>{{x++}}</td>

    <td>{{$attempt->exam->exam_name}}</td>

    <td>
    @if ($attempt->status == 0)
    Not Declared
    @else  
    @if ($attempt->marks >= $attempt->exam->pass_marks)
      <span style="color: green">Passed</span>  
      @else
      <span style="color:red">Failed</span>  
    @endif

    @endif
    </td>

    <td>
   @if ($attempt->status == 0)
    <span style="color: yellow">Pending</span>
    @else 
<a href="" data-id="{{$attempt->id}}" >Review Questions</a>
    @endif
    </td>
</tr>
    
@endforeach
@else
<tr>
<td colspan="4">You have not attempted exam</td>
</tr>
@endif

   </tbody>
    </table>
</div>
 </div>

@endsection