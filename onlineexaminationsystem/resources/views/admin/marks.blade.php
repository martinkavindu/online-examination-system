
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

    <td><button class="btn btn-warning Editmarks" data-id="{{$exam->id}}">Edit</button></td>
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
    
@endsection