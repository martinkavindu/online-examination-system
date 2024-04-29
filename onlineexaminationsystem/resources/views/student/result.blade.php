@extends('student.layout')

@section('content')

 <h2>Results</h2>


 <div class="panel panel-default">

<div class="panel-body">


    <table class="table table-striped table-bordered" style="background-color: white">
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

@foreach ($attempt as $attempt)
<tr>
    <td>{{$x++}}</td>

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
    <a href="#" class="reviewqsn" data-id="{{$attempt->id}}" data-bs-toggle="modal" data-bs-target="#reviewqsn">Review Questions</a>
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


 
<div class="modal" id="reviewqsn">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Review your exam questions</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body review-qsn">
          loading ..
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          
        </div>
        
      </div>
    </div>

@endsection