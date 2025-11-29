@extends('layouts.app')
@section('title', 'Students List')
@section('content')
<div class="container mt-5">
    
    <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
            <h3 class="text-white fw-light m-0">Students List</h3>
        </div>
        <a href="{{ route('students.create') }}" class="btn-add-minimal text-decoration-none fw-bold">
            + New Student
        </a>
        
    </div>
         @session('success') 
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ $value }} 
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endsession

    <div class="table-responsive">
        <table class="table minimal-table align-middle">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NAME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">PHONE</th>
                    <th scope="col" class="text-end">ACTIONS</th>
                </tr>
            </thead>
            <tbody>

            @forelse($students as $student)
        
                {{-- Contoh Baris Pertama --}}
                <tr>
                    <td> {{ $student->id }}</td>
                    <td> {{ $student->name }}</td>
                    <td> {{ $student->email }}</td>
                    <td> {{ $student->phone }}</td>
                    <td class="text-end">
                        {{-- Tombol Actions diubah menjadi link teks sederhana --}}
                        <a href="{{ route('students.show', $student->id) }}" class="action-link text-white me-3">View</a>
                        <a href="{{ route('students.edit', $student->id) }}" class="action-link text-success me-3">Edit</a>
                    <button type="button" class="action-link text-danger border-0 bg-transparent p-0 delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal" data-action="{{ route('students.destroy', $student->id) }}">Delete</button>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No Student Found!</td>
            </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <!-- Pagination -->
        <div class="d-flex justify-content-end mt-4">
        {{ $students->links('vendor.pagination.bootstrap-5-dark') }}
         </div>
    </div>

    <!-- Delete Modal -->
     <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white border-secondary shadow-lg">
            <div class="modal-header border-bottom border-secondary">
                <h5 class="modal-title fw-light">Delete Confirmation</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4">
                <p class="mb-0 text-white-50">
                    Are you sure you want to delete this student data? 
                    <br> <small class="text-danger">This action cannot be undone.</small>
                </p>
            </div>
            <div class="modal-footer border-top border-secondary">
                <button type="button" class="btn btn-link text-white text-decoration-none" data-bs-dismiss="modal">Cancel</button>
                
                {{-- Form Eksekusi Delete --}}
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger px-4 rounded-pill">Yes, Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteModal = document.getElementById('deleteModal');
        
        // Saat modal akan dibuka
        deleteModal.addEventListener('show.bs.modal', function (event) {
            // Tombol yang diklik
            var button = event.relatedTarget;
            
            // Ambil URL dari atribut data-action
            var actionUrl = button.getAttribute('data-action');
            
            // Masukkan URL tersebut ke dalam action form di modal
            var form = deleteModal.querySelector('#deleteForm');
            form.action = actionUrl;
        });
    });
</script>

<style>
    /* --- CSS Tabel Minimalis --- */

    /* Reset background tabel agar transparan */
    .minimal-table {
        --bs-table-bg: transparent; 
        --bs-table-color: #fff;
    }

    /* Styling Header Tabel (Judul Kolom) */
    .minimal-table thead th {
        border-bottom: 1px solid #444; /* Garis bawah header agak tebal sedikit */
        color: #888; /* Warna teks abu-abu */
        font-size: 0.75rem; /* Ukuran kecil */
        text-transform: uppercase; /* Huruf kapital semua */
        letter-spacing: 1px; /* Jarak antar huruf */
        font-weight: 600;
        padding-bottom: 15px;
    }

    /* Styling Baris Data (Rows) */
    .minimal-table tbody td {
        border-bottom: 1px solid #333; /* Garis pemisah antar baris sangat tipis/gelap */
        padding: 20px 0; /* Memberi ruang (whitespace) vertikal agar lega */
        font-size: 0.95rem;
    }

    /* Efek Hover (Saat mouse di atas baris) */
    .minimal-table tbody tr:hover td {
        color: #fff; /* Pastikan teks tetap putih */
        background-color: rgba(255, 255, 255, 0.02); /* Highlight sangat halus */
    }

    /* Menghilangkan border pada baris terakhir agar rapi */
    .minimal-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* --- Styling Tombol & Link --- */

    /* Tombol Add New Student */
    .btn-add-minimal {
        color: #198754; /* Hijau */
        border: 1px solid #198754;
        padding: 8px 20px;
        border-radius: 50px; /* Bentuk Pill (bulat lonjong) */
        font-size: 0.8rem;
        transition: all 0.3s ease;
    }

    .btn-add-minimal:hover {
        background-color: #198754;
        color: #fff;
    }

    /* Link Action (View, Edit, Delete) */
    .action-link {
        text-decoration: none;
        font-size: 0.85rem;
        opacity: 0.8;
        transition: opacity 0.2s;
    }
    
    .action-link:hover {
        opacity: 1;
        text-decoration: underline;
    }

    /* Opsional: Membuat backdrop modal lebih gelap/blur */
    .modal-backdrop.show {
    opacity: 0.8; /* Lebih gelap dari default */
    background-color: #000;
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function(){
        const deleteButtons = document.querySelectorAll('.btn-delete');
        const deleteForm = document.getElementById('deleteForm');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(){
                const studentId = this.dataset.id;
                deleteForm.action = '/students/${studentId}';
            });
        });
    });
</script>
@endsection