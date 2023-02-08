<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveInsurerRequest;
use App\Models\Insurer;

class InsurerController extends Controller
{
    public function index()
    {
        return view('insurer.index', [
            'insurers' => Insurer::latest()->paginate(5)
        ]);
    }

    public function create()
    {
        return view('insurer.create', [
            'insurer' => new Insurer
        ]);
    }

    public function store(SaveInsurerRequest $request)
    {

        Insurer::create($request->validated());

        //return redirect()->route('projects.show', $project);
        return redirect()->route('insurers.index')->with('status', 'Aseguradora añadida con éxito');
    }

    public function show(Insurer $insurer)
    {
        return view('insurer.show', [
            'insurer' => $insurer
        ]);
    }

    public function edit(Insurer $insurer)
    {
        return view('insurer.edit', [
            'insurer' => $insurer
        ]);
    }

    public function update(Insurer $insurer, SaveInsurerRequest $request)
    {

        $insurer->update($request->validated());
        return redirect()->route('insurers.show', $insurer)->with('status', 'Aseguradora actualizada con éxito');
    }

    public function destroy(Insurer $insurer)
    {
        $insurer->delete();
        return redirect()->route('insurers.index')->with('status', 'Aseguradora eliminada con éxito');
    }
}
