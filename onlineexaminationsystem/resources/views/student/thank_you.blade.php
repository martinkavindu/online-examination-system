@extends('student.layout')

@section('content')
    
<div class="container">

    <div class="text-center">
        <h2 class="text-success"> Thank you {{Auth::user()->name}} for submitting your exam</h2>
        <p class="text-white mt-5"> We will review the exam and update you as soon as possible</p>

        <a href="/dashboard" class="btn btn-primary mt-3"> Go back</a>
    </div>
</div>
@endsection