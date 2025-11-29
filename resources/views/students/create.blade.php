@extends('layouts.app')
@section('title', 'Add Students') 
@section('content')

{{-- Container utama --}}
<div class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-md-4 col-10">
        <h3 class="text-white mb-5 fw-light text-center">New Student</h3> 
        <a href="{{ route('students.index') }}" class="btn-back-yellow text-decoration-none fw-bold">
           <span>&larr;</span> Back to Students List
        </a>
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="mb-4 group">
                <input type="text" 
                       class="minimal-input w-100 @error('name') is-invalid @enderror" 
                       placeholder="Name" 
                       name="name"
                       value="{{ old('name') }}"> {{-- Tambahkan old() agar data tidak hilang --}}   
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
                       value="{{ old('email') }}">
                
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
                       value="{{ old('phone') }}">               
                @error('phone')
                    <div class="invalid-feedback small mt-1">
                        {{ $message }}
                    </div>
                @enderror      
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-link text-success text-decoration-none fw-bold px-0">
                    SAVE DATA <span class="ms-2">&rarr;</span>
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
        border-bottom: 1px solid #444; /* Warna default (abu gelap) */
        color: #fff;
        padding: 10px 0;
        font-size: 1rem;
        outline: none;
        transition: all 0.3s ease;
        border-radius: 0; /* Pastikan tidak ada radius */
    }

    /* Saat input diklik (Focus) */
    .minimal-input:focus {
        border-bottom: 1px solid #198754; /* Hijau saat aktif */
        box-shadow: none; 
        color: #fff;
        background: transparent;
    }

    /* --- PERBAIKAN VALIDASI ERROR --- */
    
    /* Paksa style error agar tetap minimalis (hanya garis merah) */
    .minimal-input.is-invalid {
        border: none !important; /* Hapus border kotak bawaan bootstrap */
        border-bottom: 1px solid #dc3545 !important; /* Ganti jadi garis merah */
        background-image: none !important; /* Hapus icon tanda seru merah */
        box-shadow: none !important; /* Hapus glow merah */
        padding-right: 0 !important; /* Reset padding icon */
    }

    /* Saat input error diklik/focus */
    .minimal-input.is-invalid:focus {
        border-bottom: 1px solid #dc3545 !important; /* Tetap merah saat diklik */
        background-color: transparent !important;
        color: #fff;
    }

    /* Style pesan error text di bawahnya */
    .invalid-feedback {
        font-size: 0.85rem;
        color: #dc3545; /* Merah standar error */
        font-weight: 300;
        text-align: left;
    }

    /* --- Style Tambahan --- */
    .minimal-input::placeholder {
        color: #666;
        font-weight: 300;
    }

    /* Autofill Fix untuk Dark Mode */
    input:-webkit-autofill,
    input:-webkit-autofill:hover, 
    input:-webkit-autofill:focus, 
    input:-webkit-autofill:active{
        -webkit-box-shadow: 0 0 0 30px #1a1a1a inset !important;
        -webkit-text-fill-color: white !important;
        transition: background-color 5000s ease-in-out 0s;
    }

    .btn-back-yellow {
    /* Tambahkan !important untuk memaksa warna berubah */
    color: #ffc107 !important; 
    
    /* Sisa style yang lama */
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
    color: #000 !important; /* Teks jadi hitam saat hover */
    box-shadow: 0 0 10px rgba(255, 193, 7, 0.4);
}
</style>
@endsection