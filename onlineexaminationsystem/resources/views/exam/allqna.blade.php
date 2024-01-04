
@extends('admin.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h2>All Questions and Answers</h2>
    </div>
    <div class="card-body">
        <a href="{{route('importqna')}}" class="btn btn-info btn-sm" title="Add New course">
            <i class="fa fa-upload" aria-hidden="true"></i>  Import Q&A
        </a>
        <div class="mt-5">
      
        <table class="table table-bordered">
            <thead>
              <tr>
                <th >No</th>
                <th>Questions</th>
                <th>Answers</th>
                <th>Edit</th>
                <th>Delete</th>
 </tr>
            </thead>
<tbody>

    @foreach($questions as $question)
     <tr>

        <td>
            {{$question->id}}
        </td>
        <td>
            {{$question->question}}
        </td>
        <td>
    <a href="{{route('answers',$question->id)}}" class="ansButton" data-id="{{$question->id}}">See answer </a>
        </td>

        <td> <a href="" class="btn btn-info" title="edit">Edit </a> </td>
        <td> <a href="" class="btn btn-danger" title="delete">Delete </a> </td>
     </tr>

    @endforeach
</tbody>

          </table>
        </div>

    </div>
</div>
    
@endsection