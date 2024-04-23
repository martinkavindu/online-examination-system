
@extends('admin.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h2>Student exam</h2>
    </div>
    <div class="card-body">
        <div class="mt-5">
      
        <table class="table table-bordered">
            <thead>
              <tr>
                <th >SN</th>
                <th> Student </th>
                <th>Exam</th>
                <th>status</th>
                <th>Review</th>
 </tr>
            </thead>
<tbody>
@if (count($attempts)>0)

@php

$x = 1
    
@endphp

@foreach ($attempts as $attempt)

<tr>
    <td> {{$x++}} </td>
    <td>{{$attempt->user->name}}</td>
    <td>{{$attempt->exam->exam_name}}</td>


    <td> 
        @if ($attempt->status == 0)

        <span class="text-danger"> Pending </span>
            
        @else
            <span class="text-success">Approved</span>
         
        @endif
    </td>
    <td> 
        @if ($attempt->status == 0)

        <a href="#" class="reviewExam" data-id="{{$attempt->id}}" data-bs-toggle="modal" data-bs-target="#reviewmarks">Review & Approve</a>
           
        @else
            <span class="text-success">Completed</span>
        @endif

    </td>
</tr>
    
@endforeach
    
@else
    
<tr> 

    <td colspan="5"> No available Students Exam attempts </td>
</tr>
@endif
    
</tbody>

          </table>
        </div>

    </div>
</div>



<div class="modal" id="reviewmarks">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Review exam</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->

        <form id="approveForm">
          @csrf
          <input type="hidden"  id="attempt_id" name="attempt_id"/>
        <div class="modal-body review-exam">
          loading ..
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Approve</button>
        </div>
        </form>
      </div>
    </div>

@endsection

