
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
      
        <table class="table">
            <thead>
              <tr>
                <th >No</th>
                <th>Exam name</th>
                <th> Subject name </th>
                <th>Date</th>
                <th>Time</th>
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
                <td>{{$item->time}}</td>
                <td>
                <a href="{{route('editsubject',$item->id)}}" title="Edit exam"><button class="btn btn-primary btn-sm"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit</button></a>

                </td>
                <td>  <a href="{{route('deletesubject',$item->id)}}" onclick="confirmation(event)" title=" Delete exam"><button class="btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</button></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

    </div>
</div>
    
@endsection