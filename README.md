# Student Management System (CRUD Laravel)

Aplikasi web untuk pengelolaan data siswa/mahasiswa yang dibangun menggunakan PHP, framework Laravel, dan database MySQL. Proyek ini menerapkan konsep arsitektur MVC, validasi formulir berlapis, dan paginasi data.

## Fitur Utama

- **Manajemen Data Siswa (CRUD)**:
  - Tambah data siswa baru (Nama, Email, Nomor Telepon).
  - Tampilan daftar data dengan paginasi (5 data per halaman).
  - Detail profil siswa berdasarkan ID.
  - Pembaruan dan penghapusan data siswa.
- **Validasi Formulir**:
  - Validasi panjang karakter nama.
  - Pengecekan keunikan format email dan nomor telepon (12 digit).
  - Penanganan aturan validasi saat update data agar tidak terjadi duplikasi.
- **Notifikasi Status**: Menampilkan pesan sukses secara dinamis setelah operasi tambah, ubah, atau hapus data.

## Tech Stack

- **Backend**: PHP 8.x, Laravel
- **Database**: MySQL
- **Frontend**: Blade Templating, Bootstrap
- **Version Control**: Git & GitHub

## Panduan Menjalankan Proyek Secara Lokal

### Prasyarat
- PHP >= 8.2
- Composer
- MySQL Server (XAMPP / Laragon / Native)

### Langkah Instalasi

1. **Clone repositori ini:**
   ```bash
   git clone https://github.com/WindraNatan/CRUD.git
   cd CRUD
