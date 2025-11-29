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
        
                <tr>
                    <td> {{ $student->id }}</td>
                    <td> {{ $student->name }}</td>
                    <td> {{ $student->email }}</td>
                    <td> {{ $student->phone }}</td>
                    <td class="text-end">
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
        
        
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var actionUrl = button.getAttribute('data-action');
            var form = deleteModal.querySelector('#deleteForm');
            form.action = actionUrl;
        });
    });
</script>

<style>
    /* --- Tabel --- */

    
    .minimal-table {
        --bs-table-bg: transparent; 
        --bs-table-color: #fff;
    }

   
    .minimal-table thead th {
        border-bottom: 1px solid #444; 
        color: #888; 
        font-size: 0.75rem; /
        text-transform: uppercase;
        letter-spacing: 1px; 
        font-weight: 600;
        padding-bottom: 15px;
    }

   
    .minimal-table tbody td {
        border-bottom: 1px solid #333; 
        padding: 20px 0; 
        font-size: 0.95rem;
    }

    
    .minimal-table tbody tr:hover td {
        color: #fff; 
        background-color: rgba(255, 255, 255, 0.02);
    }

    
    .minimal-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* --- Styling Tombol & Link --- */

    /* Tombol Add New Student */
    .btn-add-minimal {
        color: #198754; 
        border: 1px solid #198754;
        padding: 8px 20px;
        border-radius: 50px; 
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

  
    .modal-backdrop.show {
    opacity: 0.8; 
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