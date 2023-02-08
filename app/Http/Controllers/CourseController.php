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
            $mapFile = $request->file('map_image');
            if ($mapFile !== null) {
                $extension = $mapFile->getClientOriginalExtension();
                //check for image extension
                if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                    return redirect()->route('course.create')->with('status', 'Error al crear la cursa: La imatge ha de ser jpg, png o jpeg');
                } else if ($mapFile->getSize() < 5000000) {
                    $filename = time() . '.' . $extension;
                    $mapFile->move('uploads/courses/mapimages/', $filename);

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
            $mapFile = $request->file('map_image');
            $requestArray = $request->validated();
            $images = $request->file('images');

            if ($mapFile !== null) {
                $extension = $mapFile->getClientOriginalExtension();
                //check for image extension
                if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                    return redirect()->route('course.edit', $course)->with('status', 'Error al actualizar la cursa: La imatge ha de ser jpg, png o jpeg');
                } else if ($mapFile->getSize() < 5000000) {
                    $filename = time() . '.' . $extension;
                    $mapFile->move('uploads/courses/mapimages/', $filename);

                    $requestArray['map_image'] = $filename;
                } else {
                    return redirect()->route('course.edit', $course)->with('status', 'Error al actualizar la cursa: La imatge no pot pesar més de 5MB');
                }
            }

            if ($images !== null) {
                $imagesArray = [];
                foreach ($images as $image) {
                    $extension = $image->getClientOriginalExtension();
                    //check for image extension
                    if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                        return redirect()->route('course.edit', $course)->with('status', 'Error al actualizar la cursa: La imatge ha de ser jpg, png o jpeg');
                    } else if ($image->getSize() < 5000000) {
                        $filename = time() . '.' . $extension;
                        $image->move('uploads/courses/', $filename);

                        array_push($imagesArray, $filename);
                    } else {
                        return redirect()->route('course.edit', $course)->with('status', 'Error al actualizar la cursa: La imatge no pot pesar més de 5MB');
                    }
                }
                $requestArray['images'] = json_encode($imagesArray);
            }

            $course->update($requestArray);

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
            $image_path = public_path() . '/uploads/courses/mapimages/' . $course->map_image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        $course->delete();
        return redirect()->route('course.index')->with('status', 'La cursa fue eliminada con éxito');
    }
}