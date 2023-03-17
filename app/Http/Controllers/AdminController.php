<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $role = Auth::user()->roles->first()->name;

        if ($role == 'admin') {
            return view('admin.panel');
        } else {
            return redirect()->route('home');
        }
    }
}