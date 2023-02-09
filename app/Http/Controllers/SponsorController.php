<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveSponsorRequest;
use App\Models\Course;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{

    public function index()
    {
        return view('sponsor.index', [
            'sponsors' => Sponsor::latest()->paginate(5)
        ]);
    }

    public function show(Sponsor $sponsor)
    {
        //$courses = $sponsor->courses()->get();
        $courses = $sponsor->courses();
        return view('sponsor.show', [
            'sponsor' => $sponsor,
            'courses' => $courses
        ]);
    }

    public function create()
    {
        $courses = Course::all();

        return view('sponsor.create', [
            'sponsor' => new Sponsor,
            'courses' => $courses
        ]);
    }


    public function store(SaveSponsorRequest $request)
    {
        $courses = $request->courses;
        $requestArray = $request->validated();
        //$requestArray['courses'] = "";
        $sponsor = Sponsor::create($requestArray);

        //echo $name;
        $sponsor->courses()->attach($courses);


        return redirect()->route('sponsor.index')->with('status', 'Patrocinador creado con éxito');
    }
}
