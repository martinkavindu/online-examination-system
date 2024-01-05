
@extends('admin.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h2>Questions</h2>
    </div>
    <div class="card-body">

        <div class="mt-5">
      
            <table class="table table-bordered">
                <thead>
                    <tr>
                    
                        <th>Exam id</th>
                        
                        <th> Question id</th>
                    </tr>
                </thead>
                <tbody>
                    @if(is_array($questions))
                        @foreach ($questions as $index => $item)
                            <tr>      
                                <td>{{ $item['exam_id'] }}</td>
                                <td>{{ $item['question_id'] }}</td>
                            </tr>
                        @endforeach
                    @else
                        <p>No questions available.</p>
                    @endif
                </tbody>
                
            </table>
            
        </div>

    </div>
</div>
    
@endsection