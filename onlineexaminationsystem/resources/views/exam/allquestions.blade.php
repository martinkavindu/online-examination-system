
@extends('admin.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h2>Questions</h2>
    </div>
    <div class="card-body">

        <div class="mt-5">
      
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                    
                        <th>Exam id</th>
                        
                        <th> Question id</th>
                        <th>Question</th>
                        <th>Explanation</th>
                    </tr>
                </thead>
                <tbody>
                   
                    <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <td>{{ $exam->id }}</td>
                                <td>{{ $question['id'] }}</td>
                                <td>{{ $question['question'] }}</td>
                                <td>{{ $question['explanation'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    
                    
                </tbody>
                
            </table>
            
        </div>

    </div>
</div>
    
@endsection