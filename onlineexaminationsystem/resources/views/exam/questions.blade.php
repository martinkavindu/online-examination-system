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
        <div class="mb-3">
        <label class="text-white"> Select questions</label>
        </div>
        <div class="container mb-3">
            <select class="form-control form-select" name="questions" multiple multiselect-search='true'
            multiselect-select-all="true" multiselect-max-items="20" placeholder='select question'>
              <option value=""> one</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
              <option value="4">Four</option>
            </select>
          </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
