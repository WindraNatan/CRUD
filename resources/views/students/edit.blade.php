@extends('layouts.app')
@section('title', 'Edit Students') 
@section('content')

{{-- Container utama --}}
<div class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-md-4 col-10">
        <h3 class="text-white mb-5 fw-light text-center">Edit student</h3> 
        <a href="{{ route('students.index') }}" class="btn-back-yellow text-decoration-none fw-bold">
           <span>&larr;</span> Back to Students List
        </a>
        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4 group">
                <input type="text" 
                       class="minimal-input w-100 @error('name') is-invalid @enderror" 
                       placeholder="Name" 
                       name="name"
                       value="{{ old('name', $student->name) }}">   
                @error('name')
                    <div class="invalid-feedback small mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4 group">
                <input type="email" 
                       class="minimal-input w-100 @error('email') is-invalid @enderror" 
                       placeholder="Email Address" 
                       name="email"
                       value="{{ old('email', $student->email) }}">
                
                @error('email')
                    <div class="invalid-feedback small mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-5 group">
                <input type="text" 
                       class="minimal-input w-100 @error('phone') is-invalid @enderror" 
                       placeholder="Phone Number" 
                       name="phone"
                       value="{{ old('phone', $student->phone) }}">               
                @error('phone')
                    <div class="invalid-feedback small mt-1">
                        {{ $message }}
                    </div>
                @enderror      
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-link text-success text-decoration-none fw-bold px-0">
                    UPDATE <span class="ms-2">&rarr;</span>
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    /* --- Style Dasar Input --- */
    .minimal-input {
        background: transparent;
        border: none;
        border-bottom: 1px solid #444; 
        color: #fff;
        padding: 10px 0;
        font-size: 1rem;
        outline: none;
        transition: all 0.3s ease;
        border-radius: 0; 
    }
   
    .minimal-input:focus {
        border-bottom: 1px solid #198754;
        box-shadow: none; 
        color: #fff;
        background: transparent;
    }

    /* --- PERBAIKAN VALIDASI ERROR --- */
    
    
    .minimal-input.is-invalid {
        border: none !important; 
        border-bottom: 1px solid #dc3545 !important;
        background-image: none !important; 
        box-shadow: none !important; 
        padding-right: 0 !important; 
    }

    
    .minimal-input.is-invalid:focus {
        border-bottom: 1px solid #dc3545 !important; 
        background-color: transparent !important;
        color: #fff;
    }

   
    .invalid-feedback {
        font-size: 0.85rem;
        color: #dc3545; 
        font-weight: 300;
        text-align: left;
    }

   
    .minimal-input::placeholder {
        color: #666;
        font-weight: 300;
    }

    
    input:-webkit-autofill,
    input:-webkit-autofill:hover, 
    input:-webkit-autofill:focus, 
    input:-webkit-autofill:active{
        -webkit-box-shadow: 0 0 0 30px #1a1a1a inset !important;
        -webkit-text-fill-color: white !important;
        transition: background-color 5000s ease-in-out 0s;
    }

    .btn-back-yellow {
  
    color: #ffc107 !important; 
    
    
    border: 1px solid #ffc107;
    padding: 8px 20px;
    border-radius: 50px;
    font-size: 0.8rem;
    transition: all 0.3s ease;
    background: transparent;
    display: inline-block;
}

.btn-back-yellow:hover {
    background-color: #ffc107 !important;
    color: #000 !important; 
    box-shadow: 0 0 10px rgba(255, 193, 7, 0.4);
}
</style>
@endsection