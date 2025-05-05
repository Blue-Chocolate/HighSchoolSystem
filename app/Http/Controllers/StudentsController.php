<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    // Show all students
    public function index()
    {
        $students = Student::all(); 
        return view('admin.students', compact('students'));
    }

    // Show the form to create a student
    public function create()
    {
        return view('admin.create-student');
    }

    // Handle storing a new student
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'  => 'required|string|max:255',
            'last_name'   => 'required|string|max:255',
            'grade'       => 'nullable|in:10,11,12',
            'email'       => 'required|email|unique:students,email',
            'phone'       => 'nullable|string|max:20',
            'gender'      => 'nullable|in:male,female,other',
            'birth_date'  => 'nullable|date',
            'address'     => 'nullable|string',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    // Show a single student (optional)
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.show-student', compact('student'));
    }

    // Show the edit form
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.edit-student', compact('student'));
    }

    // Handle updating a student
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'first_name'  => 'required|string|max:255',
            'last_name'   => 'required|string|max:255',
            'grade'       => 'nullable|in:10,11,12',
            'email'       => 'required|email|unique:students,email,' . $id,
            'phone'       => 'nullable|string|max:20',
            'gender'      => 'nullable|in:male,female,other',
            'birth_date'  => 'nullable|date',
            'address'     => 'nullable|string',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    // Handle deleting a student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
