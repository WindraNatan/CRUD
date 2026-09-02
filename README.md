# Student Management System

A web-based CRUD application for managing student records, built with PHP, Laravel 11, and MySQL as part of the Web Programming course at Universitas Tanjungpura.

## About

This application manages student data (Create, Read, Update, Delete) with server-side validation, paginated data listing, and flash session notifications following the MVC (Model-View-Controller) architecture.

## Features

- Complete CRUD operations for student records (Name, Email, Phone number)
- Form request validation with unique constraints and custom length rules
- Data pagination (5 records per page) with Bootstrap styling
- Flash session messages for user feedback on successful operations
- RESTful route structure using named resource controllers

## Project Structure

```
CRUD/
├── app/
│   ├── Http/Controllers/
│   │   └── StudentsController.php  # Handles request validation and CRUD logic
│   └── Models/
│       └── Student.php             # Eloquent model for students table
├── database/
│   └── migrations/
│       └── *_create_students_table.php # Database schema definition
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php       # Main layout template with Bootstrap UI
│       └── students/
│           ├── index.blade.php     # Data listing with pagination links
│           ├── create.blade.php    # Form to add a new student
│           ├── edit.blade.php      # Form to update existing student
│           └── show.blade.php      # Detailed view of a single student
└── routes/
    └── web.php                     # Route definitions mapping to controller
```

## Requirements

- PHP >= 8.2
- Composer
- MySQL Server (XAMPP / Laragon / Native)

## Setup & Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/WindraNatan/CRUD.git
   cd CRUD
   ```

2. **Install Composer dependencies:**
   ```bash
   composer install
   ```

3. **Configure environment:**
   ```bash
   cp .env.example .env
   ```
   *(Windows Command Prompt: `copy .env.example .env`)*

4. **Generate application key:**
   ```bash
   php artisan key:generate
   ```

5. **Database Configuration:**
   Create a MySQL database (e.g. `crud_students`) and update your `.env` file:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=crud_students
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Run database migrations:**
   ```bash
   php artisan migrate
   ```

## Usage

Start the local development server:
```bash
php artisan serve
```

Access the application in your browser at `http://localhost:8000`.

### Available Routes

| Method | URI | Action | Description |
| :--- | :--- | :--- | :--- |
| GET | `/students` | `students.index` | Display list of students with pagination |
| GET | `/students/create` | `students.create` | Show form to add a new student |
| POST | `/students` | `students.store` | Store a new student in database |
| GET | `/students/{student}` | `students.show` | Show specific student details |
| GET | `/students/{student}/edit` | `students.edit` | Show form to edit student details |
| PUT | `/students/{student}` | `students.update` | Update existing student data |
| DELETE | `/students/{student}` | `students.destroy` | Delete student record |

## Concepts Covered

- Model-View-Controller (MVC) architectural pattern
- Laravel Routing and Named Routes
- Form Validation and Error Handling (`Rule::unique()->ignore()`)
- Database Migrations and Schema Blueprint
- Eloquent ORM operations
- Blade Templating and Layout Inheritance

## License

MIT
