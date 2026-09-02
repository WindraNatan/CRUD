@extends('layouts.app')
@section('title', 'Student Details')

@section('content')
<div class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-md-4 col-10">
        <h3 class="text-white mb-4 fw-light text-center">Student Details</h3>

        <div class="mb-4">
            <label class="minimal-label">NAME</label>
            <div class="minimal-data">{{ $student->name }}</div>
        </div>

        <div class="mb-4">
            <label class="minimal-label">EMAIL</label>
            <div class="minimal-data">{{ $student->email }}</div>
        </div>

        <div class="mb-5">
            <label class="minimal-label">PHONE</label>
            <div class="minimal-data">{{ $student->phone }}</div>
        </div>

        <div class="d-flex justify-content-start align-items-center mt-4">
            <a href="{{ route('students.index') }}" class="btn-back-yellow">
                &larr; Back to Students List
            </a>
        </div>
    </div>
</div>
@endsection