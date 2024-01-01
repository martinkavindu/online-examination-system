
@extends('admin.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h2>Exams</h2>
    </div>
    <div class="card-body">
    <a href="{{route('addexam')}}" class="btn btn-success btn-sm" title="Add New course">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
        <div class="mt-5">
      
        <table class="table table-bordered">
            <thead>
              <tr>
                <th >No</th>
                <th>Exam name</th>
                <th> Subject name </th>
                <th>Date</th>
                <th>Time</th>
                <th>Exam attempts</th>
                <th> Questions</th>
                <th>Edit</th>
                <th> Delete</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($exams as $item)
                    
            
              <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{$item->exam_name}}</td>
                <td>{{$item->subject_name}}</td>
                <td>{{$item->date}}</td>
                <td>{{$item->time}} Hrs</td>
                <td>{{$item->attempt}} Times</td>

                <td> <a href ='{{route('questions',$item->id)}}' > Add Questions </a> </td>
      
                <td>
                <a href="{{route('editexam',$item->id)}}" title="Edit exam"><button class="btn btn-primary btn-sm"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit</button></a>

                </td>
                <td>  <a href="{{route('deleteexam',$item->id)}}" onclick="confirmation(event)" title=" Delete exam"><button class="btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</button></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

    </div>
</div>
    
@endsection