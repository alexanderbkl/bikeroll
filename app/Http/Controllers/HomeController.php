<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     //   $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        if ($user) {
            if ($user->paid == 0) {
                return redirect()->route('user.validate', $user);
            }
        }

        //list of all Sponsors which have paid
        $sponsors = Sponsor::where('main_plane', 1)->get();



        return view('home', [
            'sponsors' => $sponsors,
        ]);


    }
}