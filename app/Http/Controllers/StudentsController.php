<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(5);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|digits_between:10,13|unique:students,phone',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student Added Successfully');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('students', 'email')->ignore($student->id),
            ],
            'phone' => [
                'required',
                'digits_between:10,13',
                Rule::unique('students', 'phone')->ignore($student->id),
            ],
        ]);

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student Updated Successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student Deleted Successfully');
    }
}