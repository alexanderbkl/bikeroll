<?php

namespace App\Http\Controllers;

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
        return view('course.create', [
            'course' => new Course
        ]);
    }
}
