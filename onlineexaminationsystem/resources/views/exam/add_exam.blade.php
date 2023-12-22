@extends('admin.dashboard')

@section('content')
    <form action="{{route('storexam')}}" method="post">
        @csrf
<div class="mb-5"> 
    <h3 class="btn btn-success"> Add Exam</h3>
</div>
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
  <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection