<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeachersController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all(); 
        return view('admin.teachers', compact('teachers'));
    }

    public function create()
    {
        return view('admin.create-teacher');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'  => 'required|string|max:255',
            'last_name'   => 'required|string|max:255',
            'department'  => 'nullable|in:Mathematics,Science,English,History',
            'email'       => 'required|email|unique:teachers,email',
            'status'      => 'nullable|in:inactive,active',
            'phone'       => 'nullable|string|max:20',
            'gender'      => 'nullable|in:male,female,other',
            'birth_date'  => 'nullable|date',
            'address'     => 'nullable|string',
        ]);

        Teacher::create($validated);

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully.');
    }

    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin.show-teacher', compact('teacher'));
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin.edit-teacher', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $validated = $request->validate([
            'first_name'  => 'required|string|max:255',
            'last_name'   => 'required|string|max:255',
            'department'  => 'nullable|in:Mathematics,Science,English,History',
            'email'       => 'required|email|unique:teachers,email,' . $id,
            'status'      => 'nullable|in:inactive,active',
            'phone'       => 'nullable|string|max:20',
            'gender'      => 'nullable|in:male,female,other',
            'birth_date'  => 'nullable|date',
            'address'     => 'nullable|string',
        ]);

        $teacher->update($validated);

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}
