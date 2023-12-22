
@extends('admin.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h2>Subjects</h2>
    </div>
    <div class="card-body">
        <a href="" class="btn btn-success btn-sm" title="Add New course">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
        <div class="mt-5">
      
        <table class="table">
            <thead>
              <tr>
                <th >No</th>
                <th>Subject name</th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $item)
                    
            
              <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{$item->subject_name}}</td>
                <td>
                <a href="" title="Edit Subject"><button class="btn btn-primary btn-sm"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit</button></a>
                 <a onclick="" title=" Delete Course"><button class="btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</button></a>

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

    </div>
</div>
    
@endsection