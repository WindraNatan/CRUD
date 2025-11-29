<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentsController extends Controller
{
    public function index() {
        //$students = Student::orderBy('created_at', 'desc')->paginate(5);
        //OR
        $students = Student::orderByDesc('created_at')->paginate(5);
        return view('students.index', compact('students'));
    }
    public function create() {
        return view('students.create');
    }
    public function store(Request $request) {
        //validasi data
        $request->validate ([
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|digits:12|unique:students,phone',
        ]);
       // dd('ok');
       //create student
       Student::create($request->all());
       return redirect()->route('students.index')->with('success', 'Student Added Successfully' );
    }
    public function show(Student $student) {
        //find student by id
     // $student = Student::findOrFail(Student);
     // dd($student);
     return view('students.show', compact('student'));
    }

    public function edit(Student $student) {
         return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student) {
        //validasi data
        $request->validate ([
            'name' => 'required|string|min:2|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('students', 'email' )->ignore($student->id)              
            ],
            'phone' => [
             'required',
                'digits:12',
                Rule::unique('students', 'phone' )->ignore($student->id)],
        ]);
       //update student
       $student->update($request->all());
       return redirect()->route('students.index')->with('success', 'Student Updated Successfully' );
    }

    public function destroy(Student $student) {
        //delete student
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student Deleted Successfully' );
    }
}