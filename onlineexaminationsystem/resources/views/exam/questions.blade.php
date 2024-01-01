@extends('admin.dashboard')

@section('content')
    <form action="{{ route('storexam') }}" method="POST">
        @csrf

        <div class="mb-5">
            <h3 class="btn btn-success"> Add questions to exam</h3>
        </div>

        <div class="mb-3">
            <input type="hidden" class="form-control" id="exam_id" name="exam_id" placeholder="exam id"  required>
        </div>

        <div class="container mt-5">
            <select class="selectpicker" multiple aria-label="Default select example" data-live-search="true">
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
              <option value="4">Four</option>
            </select>
          </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
