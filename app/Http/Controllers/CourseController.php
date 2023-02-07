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

        try {
            $file = $request->file('map_image');
            if ($file !== null) {
                $extension = $file->getClientOriginalExtension();
                //check for image extension
                if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                    return redirect()->route('course.create')->with('status', 'Error al crear la cursa: La imatge ha de ser jpg, png o jpeg');
                } else if ($file->getSize() < 5000000) {
                    $filename = time() . '.' . $extension;
                    $file->move('uploads/courses/', $filename);

                    $requestArray = $request->validated();

                    $requestArray['map_image'] = $filename;

                    Course::create($requestArray);
                } else {
                    return redirect()->route('course.create')->with('status', 'Error al crear la cursa: La imatge no pot pesar més de 5MB');
                }
            } else {
                Course::create($request->validated());
            }
        } catch (\Exception $e) {
            //check if error is related to unique url
            if (strpos($e->getMessage(), 'courses_url_unique')) {
                return redirect()->route('course.create')->with('status', 'Error al crear la cursa: La url ya existe');
            } else {
                return redirect()->route('course.create')->with('status', 'Error al crear la cursa: ' . $e->getMessage());
            }
        }





        return redirect()->route('course.index')->with('status', 'La cursa fue creada con éxito');
    }

    public function edit(Course $course)
    {
        return view('course.edit', [
            'course' => $course
        ]);
    }

    public function update(Course $course, SaveCourseRequest $request)
    {

        try {
            $file = $request->file('map_image');
            if ($file !== null) {
                $extension = $file->getClientOriginalExtension();
                //check for image extension
                if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                    return redirect()->route('course.edit', $course)->with('status', 'Error al actualizar la cursa: La imatge ha de ser jpg, png o jpeg');
                } else if ($file->getSize() < 5000000) {
                    $filename = time() . '.' . $extension;
                    $file->move('uploads/courses/', $filename);

                    $requestArray = $request->validated();

                    $requestArray['map_image'] = $filename;

                    $course->update($requestArray);

                    echo $requestArray['map_image'];

                    $course->update($requestArray);

                } else {
                    return redirect()->route('course.edit', $course)->with('status', 'Error al actualizar la cursa: La imatge no pot pesar més de 5MB');
                }
            } else {
                $course->update($request->validated());
            }

        } catch (\Exception $e) {
            //check if error is related to unique url
            if (strpos($e->getMessage(), 'courses_url_unique')) {
                return redirect()->route('course.edit', $course)->with('status', 'Error al actualizar la cursa: La url ya existe');
            } else {
                return redirect()->route('course.edit', $course)->with('status', 'Error al actualizar la cursa: ' . $e->getMessage());
            }
        }

        return redirect()->route('course.show', $course)->with('status', 'El cursaje fue actualizado con éxito');
    }

    public function destroy(Course $course)
    {
        //delete image inside uploads/courses, if exists
        if ($course->map_image !== null) {
            $image_path = public_path() . '/uploads/courses/' . $course->map_image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        $course->delete();
        return redirect()->route('course.index')->with('status', 'La cursa fue eliminada con éxito');
    }
}
