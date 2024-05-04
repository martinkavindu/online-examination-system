@extends('student.layout')

@section('content')
<div class="card">

<div class="card-body">
    <h3 class="card-title">Paid Exams</h3>
    <table class="table table-bordered table-striped table-sm">
        <thead>
            <tr  class="fs-6" style="font-size: 12px !important">
                <th>SN</th>
                <th>Exam Name</th>
                <th>Subject Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Maximum attempts</th>
                <th>Completed attempts</th>
                <th>Remaining Attempts</th>
                <th>Copy Exam link</th>
            </tr>
        </thead>
        <tbody>
            @if(count($exams) > 0)
                @php
                    $count = 1;
                @endphp
                @foreach ($exams as $exam)
                    <tr style="font-size: 12px !important">
                        <td style="display: none;"> {{$exam->id}} </td>
                        <td>{{$count++}}</td>
                        <td>{{$exam->exam_name}}</td>
                        <td>{{$exam->subject_name}}</td>
                        <td>{{$exam->date}}</td>
                        <td>{{$exam->time}} Hrs</td>
                        <td>{{$exam->attempt}} times</td>
                        <td> {{$exam->attempt_counter}}  times</td>
                        <td>{{$exam->attempt - $exam->attempt_counter}} times</td>
                        <td>

                            @if (count($exam->payments) > 0)
                         
                        <a href="#" data-code="{{$exam->id}}" class="copy"><i class="fa fa-copy"></i></a>   
                            @else
                            <a href="#" class="btn btn-success btn-sm paynow" id="" data-id= "{{$exam->prices}}" data-acc="{{$exam->entrance_id}}" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-money"></i> Buy Now </a>
                           
                            @endif
                        
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8">No available Exams </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <div class="modal-header">
          <h4 class="modal-title">Buy Exam</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        
   <form class="buyform" method="POST" action="{{route('pay')}}">
    @csrf
        <div class="modal-body">
        
<div class="mb-2">
    <label class="form-label">Amount(KES)</label>
    <input class="form-control prices" type="text" name="amount" readonly required/>
</div>
<div class="mb-2">
    <label class="form-label">Account No</label>
    <input class="form-control account" type="text" name="account" readonly required/>
</div>
<div class="mb-2">
    <label class="form-label">Phone Number</label>
    <input class="form-control phone" type="text" name="phone"  required/>
</div>

        </div>
  
        
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="submit">Pay now</button>
        </div>
   </form>
      </div>
    </div>


@endsection
