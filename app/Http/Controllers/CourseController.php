<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return view('course.index', [
            'courses' => Course::latest()->paginate(5)
        ]);
    }

    public function show(Course $course)
    {
        return view('course.show', [
            'course' => $course
        ]);
    }

    public function create()
    {
        return view('course.create', [
            'course' => new Course
        ]);
    }

    public function store(SaveCourseRequest $request)
    {

        Course::create($request->validated());
        return view('course.index', [
            'courses' => Course::latest()->paginate(5)
        ]);
        //return redirect()->route('course.show', $course);
        return redirect()->route('course.index')->with('status', 'La cursa fue creada con éxito');
    }
}
