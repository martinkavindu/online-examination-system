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

    <td></td>
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