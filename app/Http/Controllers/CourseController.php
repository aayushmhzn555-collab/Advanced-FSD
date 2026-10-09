<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Validation rules
    private function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1|max:104',
            'fee' => 'required|numeric|min:0|max:999999.99',
            'difficulty' => 'required|in:Easy,Medium,Hard',
            'is_active' => 'sometimes|boolean',
        ];
    }

    // Show all courses (paginated)
    public function index()
    {
        $courses = Course::latest()->paginate(10);
        return view('courses.index', compact('courses'));
    }

    // Show form to create a new course
    public function create()
    {
        return view('courses.create');
    }

    // Save new course
    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['is_active'] = $request->boolean('is_active'); // handle checkbox
        Course::create($data);

        return redirect()->route('courses.index')
            ->with('success', 'Course created successfully.');
    }

    // Show single course details
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    // Show form to edit course
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    // Update course record
    public function update(Request $request, Course $course)
    {
        $data = $request->validate($this->rules());
        $data['is_active'] = $request->boolean('is_active');
        $course->update($data);

        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully.');
    }

    // Delete course record
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}
