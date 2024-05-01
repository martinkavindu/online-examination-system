@extends('admin.dashboard')

@section('content')
    <form action="{{route('updateexam',$exams->id)}}" method="post">
        @csrf
<div class="mb-5"> 
    <h3 class="btn btn-success"> Update Exam</h3>
</div>
<div class="mb-3">
    <input type="text" class="form-control " id="exam_name" name="exam_name" placeholder="Exam name" required value="{{$exams->exam_name}}">
  </div>
  <div class="mb-3">
    <input type="text" class="form-control form-select" id="subject_name" name="subject_name" placeholder="Subject" required
  value="{{$exams->subject_name}}" >

  </div>
  <div class="mb-3">
  
    <input type="date" class="form-control " id="date" name="date" placeholder="exam date" required  min="@php echo date('Y-m-d'); @endphp" value="{{$exams->date}}">
  </div>
  
  <div class="mb-3">

    <input type="time" class="form-control " id="time" name="time" placeholder="exam time" required value="{{$exams->time}}">
  </div>
  <div class="mb-3">

    <input type="number" class="form-control " id="number" name="number" placeholder="Exam attempts" required value="{{$exams->attempt}}">
  </div>

  <div class="mb-3">
    <select type="text" class="form-control" value = "{{$exams->plan}}" name="plan"  required>
      <option selected disabled> Select plan</option>
      <option value="0">Free</option>
      <option value="1">Paid</option>
    </select>
  </div>

  <div class="mb-3">
    <input type="text" name="prices" class="form-control" value="{{$exams->prices}}" placeholder="Enter prices in KES"/>
  </div>
  <button type="submit" class="btn btn-primary">Save changes</button>
    </form>

@endsection