
@extends('admin.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h2>Marks</h2>
    </div>
    <div class="card-body">
   
        <div class="mt-5">
      
        <table class="table table-bordered">
            <thead>
              <tr>
                <th >No</th>
                <th>Exam name</th>
                <th> Marks/Q</th>
              <th>Total marks</th>
              <th> Edit</th>
              </tr>
            </thead>
            <tbody>
           
                @if (count($exams) >0)

                @foreach ($exams as $exam)
                @php
                $x = 1;  
              @endphp

<tr>
    <td>
{{$x ++}}

    </td>
    <td>{{$exam->exam_name}}</td>
    <td>{{$exam->marks}}</td>
    <td>{{count($exam->getQnaExam) * $exam->marks}}</td>

    <td><button class="btn btn-warning editMarks" data-id="{{$exam->id}}"data-marks ="{{$exam->marks}}" data-totalq="{{ count($exam->getQnaExam)}}" data-bs-toggle="modal" data-bs-target="#myModal">Edit</button></td>
</tr>
                    
                @endforeach
                    
                @else
                    <tr colspan="5"> Exam not added</tr>
                @endif
            </tbody>
          </table>
        </div>

    </div>
</div>
    <!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">update marks</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <form id="editMarks">
        <div class="modal-body">


    @csrf
    <div class="row">

        <div class="col-sm-3">
<label> Marks/Q </label>
        </div>
        <div class="col-sm-6">
         <input type="hidden" name="exam_id" id="exam_id"> 
        <input type="text" class="form-control mb-3" name="marks"placeholder="enter marks/Q" id="marks"
       required>
        </div>
      </div>
      <div class="row">

        <div class="col-sm-3">
<label> Total Marks </label>
        </div>
        <div class="col-sm-6">
    
        <input type="text"  class="form-control" disabled placeholder="Total marks" id="tmarks" required>
        </div>
      </div>
    
        </div>
  
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-primary"> Update marks </button>
        </div>
  
      </div>
    </form>
    </div>

@endsection