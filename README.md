# Student Management System

A simple web-based CRUD application for managing student records, built with PHP, Laravel 11, and MySQL as part of the Web Programming course.

## About

This application handles student data management (Create, Read, Update, Delete) with server-side validation, paginated data listing, and flash session notifications following the MVC (Model-View-Controller) architecture.

## Features

- Complete CRUD operations for student records (Name, Email, Phone number)
- Form request validation with unique constraints and custom length rules
- Data pagination (5 records per page) with Bootstrap styling
- Flash session messages for user feedback on successful operations
- RESTful route structure using named resource controllers

## Project Structure
CRUD/ ├── app/ │ ├── Http/Controllers/ │ │ └── StudentsController.php # Handles request validation and CRUD logic │ └── Models/ │ └── Student.php # Eloquent model for students table ├── database/ │ └── migrations/ │ └── *_create_students_table.php # Database schema definition ├── resources/ │ └── views/ │ ├── layouts/ │ │ └── app.blade.php # Main layout template with Bootstrap UI │ └── students/ │ ├── index.blade.php # Data listing with pagination links │ ├── create.blade.php # Form to add a new student │ ├── edit.blade.php # Form to update existing student │ └── show.blade.php # Detailed view of a single student └── routes/ └── web.php # Route definitions mapping to controller

## Requirements

- PHP >= 8.2
- Composer
- MySQL Server (XAMPP / Laragon / Native)

## Setup & Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/WindraNatan/CRUD.git
   cd CRUD
