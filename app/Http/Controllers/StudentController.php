<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    // Validation rules (used in store and update)
    private function rules(?int $id = null): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('students', 'email')->ignore($id),
            ],
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'date_of_birth' => 'required|date|before:today',
        ];
    }

    // Show all students (paginated)
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    // Show form to create a new student
    public function create()
    {
        return view('students.create');
    }

    // Save new student
    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        Student::create($data);

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    // Show single student details
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // Show form to edit student
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Update student record
    public function update(Request $request, Student $student)
    {
        $data = $request->validate($this->rules($student->id));
        $student->update($data);

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    // Delete student record
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
