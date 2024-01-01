
@extends('admin.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h2>Students</h2>
    </div>
    <div class="card-body">
    <a href="{{route('addstudent')}}" class="btn btn-success btn-sm" title="Add New course">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New Student
        </a>
        <div class="mt-5">
      
        <table class="table table-bordered">
            <thead>
              <tr>
                <th >No</th>
                <th>Student name</th>
                <th> Student email </th>
              <th> Edit </th>
              <th> Delete </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($students as $item)
                    
            
              <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>

                <td>
                <a href="" title="Edit Student"><button class="btn btn-primary btn-sm"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit</button></a>

                </td>
                <td>  <a href="{{route('deletestudent',$item->id)}}" onclick="confirmation(event)" title=" Delete student"><button class="btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</button></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

    </div>
</div>
    
@endsection