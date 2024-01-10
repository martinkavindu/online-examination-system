@extends('student.layout')

@section('content')
<table class="table table-bordered bg-white">
    <thead>
      <tr>
        <th>SN</th>
        <th >Exam Name</th>
        <th>Subject Name</th>
        <th>Date</th>
        <th>Time</th>
        <th >Total Attempt</th>
        <th >available Attempt</th>
        <th>Copy Exam link</th>
      </tr>
    </thead>
 <tbody>

    @if(count($exams) >0)
@php
 $count = 1;   
@endphp
    @foreach ($exams as $exam)
        <tr>
            <td>{{$count++}}</td>
            <td>{{$exam->exam_name}}</td>
            <td>{{$exam->subject_name}}</td>
            <td>{{$exam->date}}</td>
            <td>{{$exam->time}}  Hrs</td>
            <td>{{$exam->attempt}}</td>
        </tr>
    @endforeach
       @else 
       <tr>
        <td colspan="8">No available Exams </td>
       </tr>
    @endif
 </tbody>
  </table>
@endsection