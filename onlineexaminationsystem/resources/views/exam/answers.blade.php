
@extends('admin.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h2>Answers</h2>
    </div>
    <div class="card-body">

        <div class="mt-5">
      
            <table class="table table-bordered">
                <thead>
                    <tr>
                    
                        <th>Question ID</th>
                        <th>Answer</th>
                        <th>Correct Answer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($answers as $index => $item)
                        <tr>
                          
                            <td>{{ $item->question_id }}</td>
                            <td>{{ $item->answer }}</td>
                            <td>{{ $item->is_correct }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>

    </div>
</div>
    
@endsection