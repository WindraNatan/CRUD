@extends('layouts.app')

@section('title', 'Student Details')

@section('content')

{{-- Container Utama --}}
<div class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-md-4 col-10">
        
        {{-- Header --}}
        <h3 class="text-white mb-5 fw-light text-center">Student Details</h3>

        {{-- Data Wrapper --}}
        <div class="detail-wrapper">
            
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
            <div class="d-flex justify-content-between align-items-center mt-5">

                {{-- Tombol Back Kuning --}}
                <a href="{{ route('students.index') }}" class="text-warning text-decoration-none fw-bold">
                    <span>&larr;</span> Back to List
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .minimal-label {
        font-size: 0.75rem;
        color: #6c757d; 
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
        margin-bottom: 5px;
        display: block;
    }

    .minimal-data {
        color: #fff;
        font-size: 1.1rem; 
        padding-bottom: 10px;
        border-bottom: 1px solid #444; 
        width: 100%;
        font-weight: 300;
    }

    .minimal-data:hover {
        border-color: #666;
    }
</style>
@endsection