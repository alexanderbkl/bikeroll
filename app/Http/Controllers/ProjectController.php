<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projects.index', [
            'projects' => Project::latest()->paginate()
        ]);
    }
    public function show(Project $project)
    {
        return view('projects.show', [
            'project' => $project
        ]);
    }
    public function create()
    {
        return view('projects.create', [
            'project' => new Project
        ]);
    }
    public function store()
    {
        /*
        Project::create([
            'title' => request('title'),
            'url' => request('url'),
            'description' => request('description')
        ]);*/
        Project::create(request()->validate([
            'title' => 'required',
            'url' => 'required',
            'description' => 'required'
        ]));

        //return redirect()->route('projects.show', $project);
        return redirect()->route('projects.index');
    }

 
}
