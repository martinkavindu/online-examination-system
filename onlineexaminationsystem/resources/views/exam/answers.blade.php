
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
                <th >No</th>
                <th>Answers</th>
                <th>Is Correct</th>
 </tr>
            </thead>
<tbody class="showAnswers">


</tbody>

          </table>
        </div>

    </div>
</div>
    
@endsection