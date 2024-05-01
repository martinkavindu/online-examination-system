@extends('admin.dashboard')

@section('content')
<div class="card">

 
  <div class="card-body">
    <div class="card-title">
      <h4 class="card-title">Add exam here </h4>
    </div>
    <form action="{{route('storexam')}}" method="POST">
        @csrf

<div class="mb-3">
    <input type="text" class="form-control " id="exam_name" name="exam_name" placeholder="Exam name" required>
  </div>
  <div class="mb-3">
    <select type="text" class="form-control form-select" id="subject_name" name="subject_name" placeholder="Subject" required>
<option value="">Select subject</option>
        @foreach($subjects as $id=>$name)
        <option value="{{$name}}">
          {{$name}}
        </option>
        @endforeach

    </select>
  </div>
  <div class="mb-3">
  
    <input type="date" class="form-control " id="date" name="date" placeholder="exam date" required  min="@php echo date('Y-m-d'); @endphp">
  </div>
  
  <div class="mb-3">

    <input type="time" class="form-control " id="time" name="time" placeholder="exam time" required>
  </div>
  <div class="mb-3">

    <input type="number" min="1" class="form-control " id="attempt" name="attempt" placeholder="Exam attempts" required>
  </div>

  <div class="mb-3">
    <select type="text" class="form-control" name="plan" required>
      <option selected disabled> Select plan</option>
      <option value="0">Free</option>
      <option value="1">Paid</option>
    </select>
  </div>

  <div class="mb-3">
    <input type="text" name="prices" class="form-control" placeholder="Enter prices in KES"/>
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection