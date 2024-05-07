<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>{{$title}}</title>


    <style>
        table {
          border-collapse: collapse;
          border-spacing: 0;
          width: 100%;
          border: 1px solid #ddd;
        }
        
        th, td {
          text-align: left;
          padding: 16px;
        }
        
        tr:nth-child(even) {
          background-color: #f2f2f2;
        }
        </style>
</head>
<body>
<div class="container">
<h3 style="color: green">{{$title}}</h3>
<h5>{{$date}}</h5>
<h6> Name :{{Auth::user()->name}}</h6>
<br>
<br>
<hr style="border:1px solid black">
<div class="panel panel-default">

    <div class="panel-body">
    
    
        <table class="table table-striped table-bordered" style="background-color: white">
    <thead>
        <tr>
        <th>S/N</th>
        <th>Subject</th>
        <th>Exam</th>
        <th>Result</th>
        <th>Remarks</th>
    
        </tr>
    </thead>
    
       <tbody>
    @if (count($attempt)>0)
    @php $x = 1; @endphp
    
    @foreach ($attempt as $attempt)
    <tr>
        <td>{{$x++}}</td>
        <td>{{$attempt->exam->subject_name}}</td>
    
        <td>{{$attempt->exam->exam_name}}</td>
        <td>{{$attempt->marks}}</td>
        <td>
        @if ($attempt->status == 0)
        Not Declared
        @else  
        @if ($attempt->marks >= $attempt->exam->pass_marks)
          <span style="color: green">pass</span>  
          @else
          <span style="color:red">Failed</span>  
        @endif
    
        @endif
        </td>
    
   
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
    

</div>
</body>
</html>