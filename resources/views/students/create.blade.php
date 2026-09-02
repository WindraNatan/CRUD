@extends('layouts.app')
@section('title', 'Add Student')

@section('content')
<div class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-md-4 col-10">
        <h3 class="text-white mb-4 fw-light text-center">New Student</h3>
        <div class="mb-4">
            <a href="{{ route('students.index') }}" class="btn-back-yellow">
                &larr; Back to Students List
            </a>
        </div>

        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <input type="text"
                       class="minimal-input w-100 @error('name') is-invalid @enderror"
                       placeholder="Full Name"
                       aria-label="Full Name"
                       name="name"
                       value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <input type="email"
                       class="minimal-input w-100 @error('email') is-invalid @enderror"
                       placeholder="Email Address"
                       aria-label="Email Address"
                       name="email"
                       value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-5">
                <input type="text"
                       class="minimal-input w-100 @error('phone') is-invalid @enderror"
                       placeholder="Phone Number"
                       aria-label="Phone Number"
                       name="phone"
                       value="{{ old('phone') }}">
                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-link text-success text-decoration-none fw-bold px-0">
                    SAVE DATA &rarr;
                </button>
            </div>
        </form>
    </div>
</div>
@endsection