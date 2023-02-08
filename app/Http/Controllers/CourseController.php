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
            $posterFile = $request->file('poster_image');
            $requestArray = $request->validated();
            $images = $request->file('images');

            if ($mapFile !== null) {
                $extension = $mapFile->getClientOriginalExtension();
                //get name of file
                $clientFileName = $mapFile->getClientOriginalName();
                //check for image extension
                if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                    return redirect()->route('course.create')->with('status', 'Error al actualizar la cursa: La imatge del mapa ha de ser jpg, png o jpeg');
                } else if ($mapFile->getSize() < 5000000) {
                    $filename = time() . '_' . $clientFileName;
                    $mapFile->move('uploads/courses/mapimages/', $filename);

                    $requestArray['map_image'] = $filename;
                } else {
                    return redirect()->route('course.create')->with('status', 'Error al actualizar la cursa: La imatge del mapa no pot pesar més de 5MB');
                }
            }

            if ($posterFile !== null) {
                $extension = $posterFile->getClientOriginalExtension();
                //get name of file
                $clientFileName = $posterFile->getClientOriginalName();
                //check for image extension
                if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                    return redirect()->route('course.create')->with('status', 'Error al actualizar la cursa: La imatge  del poster ha de ser jpg, png o jpeg');
                } else if ($posterFile->getSize() < 5000000) {
                    $filename = time() . '_' . $clientFileName;
                    $posterFile->move('uploads/courses/posterimages/', $filename);

                    $requestArray['poster_image'] = $filename;
                } else {
                    return redirect()->route('course.create')->with('status', 'Error al actualizar la cursa: La imatge del poster no pot pesar més de 5MB');
                }
            }

            if ($images !== null) {
                $imagesArray = [];
                foreach ($images as $image) {
                    $extension = $image->getClientOriginalExtension();
                    //get clientFileName
                    $clientFileName = $image->getClientOriginalName();
                    //check for image extension
                    if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                        return redirect()->route('course.create')->with('status', 'Error al actualizar la cursa: La llista d\'imatges ha de ser jpg, png o jpeg');
                    } else if ($image->getSize() < 50000000) {
                        $filename = time() . '_' . $clientFileName;
                        $image->move('uploads/courses/images/', $filename);

                        array_push($imagesArray, $filename);
                    } else {
                        return redirect()->route('course.create')->with('status', 'Error al actualizar la cursa: La llista d\'imatges no pot pesar més de 50MB');
                    }
                }
                $requestArray['images'] = json_encode($imagesArray);
            }

            Course::create($requestArray);
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
            $posterFile = $request->file('poster_image');
            $requestArray = $request->validated();
            $images = $request->file('images');

            if ($mapFile !== null) {
                $extension = $mapFile->getClientOriginalExtension();
                $clientFileName = $mapFile->getClientOriginalName();
                //check for image extension
                if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                    return redirect()->route('course.edit', $course)->with('status', 'Error al actualizar la cursa: La imatge ha de ser jpg, png o jpeg');
                } else if ($mapFile->getSize() < 5000000) {
                    $filename = time() . '_' . $clientFileName;
                    $mapFile->move('uploads/courses/mapimages/', $filename);

                    $requestArray['map_image'] = $filename;

                    //delete file that are named the same as in $course->map_image if exists
                    if ($course->map_image !== null && file_exists('uploads/courses/mapimages/' . $course->map_image)) {
                        unlink('uploads/courses/mapimages/' . $course->map_image);
                    }
                } else {
                    return redirect()->route('course.edit', $course)->with('status', 'Error al actualizar la cursa: La imatge no pot pesar més de 5MB');
                }
            }

            if ($posterFile !== null) {
                $extension = $posterFile->getClientOriginalExtension();
                $clientFileName = $posterFile->getClientOriginalName();
                //check for image extension
                if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                    return redirect()->route('course.edit', $course)->with('status', 'Error al actualizar la cursa: La imatge ha de ser jpg, png o jpeg');
                } else if ($posterFile->getSize() < 5000000) {
                    $filename = time() . '_' . $clientFileName;
                    $posterFile->move('uploads/courses/posterimages/', $filename);

                    $requestArray['poster_image'] = $filename;

                    //delete file that are named the same as in $course->poster_image if exists
                    if ($course->poster_image !== null && file_exists('uploads/courses/posterimages/' . $course->poster_image)) {
                        unlink('uploads/courses/posterimages/' . $course->poster_image);
                    }
                } else {
                    return redirect()->route('course.edit', $course)->with('status', 'Error al actualizar la cursa: La imatge no pot pesar més de 5MB');
                }
            }

            if ($images !== null) {
                $imagesArray = [];
                foreach ($images as $image) {
                    $extension = $image->getClientOriginalExtension();
                    //get clientFileName
                    $clientFileName = $image->getClientOriginalName();
                    //check for image extension
                    if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                        return redirect()->route('course.edit', $course)->with('status', 'Error al actualizar la cursa: La imatge ha de ser jpg, png o jpeg');
                    } else if ($image->getSize() < 5000000) {
                        $filename = time() . '_' . $clientFileName;
                        $image->move('uploads/courses/images/', $filename);

                        array_push($imagesArray, $filename);

                        //delete file that are named the same as in $course->images if exists
                        $imagesList = json_decode($course->images);
                        if ($imagesList !== null) {
                            foreach ($imagesList as $image) {
                                if (file_exists('uploads/courses/images/' . $image)) {
                                    unlink('uploads/courses/images/' . $image);
                                }
                            }
                        }
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
                //     return redirect()->route('course.edit', $course)->with('status', 'Error al actualizar la cursa: ' . $e->getMessage());
            }
        }

        return redirect()->route('course.show', $course)->with('status', 'El cursaje fue actualizado con éxito');
    }

    public function destroy(Course $course)
    {
        //delete mapimages inside uploads/courses/mapimages/, if exists
        if ($course->map_image !== null) {
            $image_path = public_path() . '/uploads/courses/mapimages/' . $course->map_image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        //delete posterimages inside uploads/courses/posterimages/, if exists
        if ($course->poster_image !== null) {
            $image_path = public_path() . '/uploads/courses/posterimages/' . $course->poster_image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        //delete images inside uploads/courses/images/, if exists
        if ($course->images !== null) {
            $images_list = json_decode($course->images);

            for ($i = 0; $i < count($images_list); $i++) {
                $image_path = public_path() . '/uploads/courses/images/' . $images_list[$i];
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        }

        $course->delete();
        return redirect()->route('course.index')->with('status', 'La cursa fue eliminada con éxito');
    }
}
