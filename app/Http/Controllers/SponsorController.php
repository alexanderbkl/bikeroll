<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveSponsorRequest;
use App\Models\Course;
use App\Models\Price;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Http\Request;

class SponsorController extends Controller
{

    public function index()
    {
        //get Sponsor and paginate 5, sortByDesc is_active
        $sponsors = Sponsor::orderBy('is_active', 'desc')->paginate(5);
        $price = Price::where(['id' => 1])->first();

    //check if price is null, if it is, create a new price
        if ($price == null) {
            $price = Price::create([
                'id' => 1,
                'main_plane_sponsorship_price' => 150,
            ]);
        }


        return view('sponsor.index', [
            'sponsors' => $sponsors,
            'price' => $price
        ]);
    }

    public function show(Sponsor $sponsor)
    {
        //$courses = $sponsor->courses()->get();
        $courses = $sponsor->courses()->get();

        $courses = $courses->sortByDesc('is_active');

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
        try {
            $logoFile = $request->file('logo');
            $courses = $request->courses;
            $requestArray = $request->validated();

            if ($logoFile !== null) {
                $extension = $logoFile->extension();
                $clientFileName = $logoFile->getClientOriginalName();
                //check for image extension
                if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                    return redirect()->route('sponsor.create')->with('status', 'Error al crear el sponsor: El logo tiene que ser jpg, png o jpeg');
                } else if ($logoFile->getSize() < 5000000) {
                    $filename = time() . '_' . $clientFileName;
                    $logoFile->move('uploads/sponsors/logos/', $filename);

                    $requestArray['logo'] = $filename;
                } else {
                    return redirect()->route('sponsor.create')->with('status', 'Error al crear el sponsor: El logo no puede pesar más de 5MB');
                }
            }
            $sponsor = Sponsor::create($requestArray);

            if (!empty($courses)) {
                $sponsor->courses()->attach($courses);
            }
        } catch (\Exception $e) {
            //check if error is related to unique cif
            if (strpos($e->getMessage(), 'sponsors_cif_unique')) {
                return redirect()->route('sponsor.create')->with('status', 'El CIF ya existe');
            } else {
                return redirect()->route('sponsor.create')->with('status', 'Error al crear el patrocinador: ' . $e->getMessage());
            }
        }


        return redirect()->route('sponsor.index')->with('status', 'Patrocinador creado con éxito');
    }

    public function edit(Sponsor $sponsor)
    {
        $courses = Course::all();
        return view('sponsor.edit', [
            'sponsor' => $sponsor,
            'courses' => $courses
        ]);
    }

    public function update(Sponsor $sponsor, SaveSponsorRequest $request)
    {

        try {
            $logoFile = $request->file('logo');
            $courses = $request->courses;
            $requestArray = $request->validated();

            if ($logoFile !== null) {
                $extension = $logoFile->extension();
                $clientFileName = $logoFile->getClientOriginalName();
                //check for image extension
                if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                    return redirect()->route('sponsor.edit', $sponsor)->with('status', 'Error al actualizar el sponsor: El logo tiene que ser jpg, png o jpeg');
                } else if ($logoFile->getSize() < 5000000) {
                    $filename = time() . '_' . $clientFileName;
                    $logoFile->move('uploads/sponsors/logos/', $filename);

                    $requestArray['logo'] = $filename;

                    //delete file that are named the same as in $sponsor->logo if exists
                    if ($sponsor->logo !== null && file_exists('uploads/sponsors/logos/' . $sponsor->logo)) {
                        unlink('uploads/sponsors/logos/' . $sponsor->logo);
                    }
                } else {
                    return redirect()->route('sponsor.edit', $sponsor)->with('status', 'Error al actualizar el sponsor: El logo no puede pesar más de 5MB');
                }
            }

            $sponsor->update($requestArray);
            //check if courses are empty
            if (!empty($courses)) {
                $sponsor->courses()->sync($courses);
            }
        } catch (\Exception $e) {
            //check if error is related to unique cif
            if (strpos($e->getMessage(), 'sponsors_cif_unique')) {
                return redirect()->route('sponsor.edit', $sponsor)->with('status', 'El CIF ya existe');
            } else {
                return redirect()->route('sponsor.edit', $sponsor)->with('status', 'Error al actualizar el patrocinador: ' . $e->getMessage());
            }
        }



        return redirect()->route('sponsor.index')->with('status', 'Patrocinador actualizado con éxito');
    }

    //create a generate method to generate a pdf with the sponsor info and all courses sponsorship price associated with the sponsor
    public function generate(Sponsor $sponsor)
    {
        //check if role is admin
        $role = Auth::user()->roles;

        //check if at least one role is admin
        if (!$role->contains('name', 'admin')) {
            return redirect()->route('sponsor.index')->with('status', 'No tienes permiso para acceder a esta página');
        }

        $courses = $sponsor->courses()->get();

        $courses = $courses->sortByDesc('is_active');




        $price = Price::where(['id' => 1])->first();

        //check if price is null, if it is, create a new price
        if ($price == null) {
            $price = Price::create([
                'id' => 1,
                'main_plane_sponsorship_price' => 150,
            ]);
        }
        $total_price = $sponsor->courses->where('is_active', true)->where('date', '>', now())->sum('sponsorship_price') + $price->main_plane_sponsorship_price;


        $pdf = PDF::loadView('sponsor.pdf', [
            'sponsor' => $sponsor,
            'courses' => $courses,
            'main_plane_sponsorship_price' => $price->main_plane_sponsorship_price,
            'total_price' => $total_price,
        ]);

        return $pdf->download($sponsor->cif.'-'.now().'.pdf');
    }

    public function setprice(Request $request)
    {
        $setPrice = $request->price;
        //set price to prices table, in main_plane_sponsorship_price column
        //if Price where id is 1 doesn't exist, create it

        $price = Price::where(['id' => 1]);

        //check if price with id 1 exists
        if ($price) {
                $price->update(["main_plane_sponsorship_price" => $setPrice]);
        }

        return redirect()->route('sponsor.index')->with('status', 'Precio patrocinio modificado con éxito.');


    }
}