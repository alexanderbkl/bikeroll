<?php

namespace App\Http\Controllers;

use App\Models\Insurer;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //show this user data
        $user = auth()->user();
        return view('user.index', ['user' => $user]);
    }
    //if is_paid and depenging on is_pro assign a federation number, if not, redirect to payment page where user can select an insurer from the list. After that, set paid to 1

    public function validateUser()
    {
        $user = auth()->user();

        //echo user name
        echo $user->name;

        if ($user->hasRole('admin')) {
            return redirect()->route('admin');
        }
        if ($user->paid == 0) {
            return redirect()->route('user.validate', $user);
        } else {
            return redirect()->route('home');
        }
    }

    public function show(Request $request)
    {
        $insurers = Insurer::all();
        $user = $request->user();

        return view('user.validate', ['user' => $user, 'insurers' => $insurers]);
    }

    public function showUsers()
    {
        $users = User::all();
        return view('user.list', ['users' => $users]);
    }
    public function update(Request $request)
    {
        //update user data
        $user = $request->user();
        //check if user is_pro
        if ($user->is_pro == 1) {
            //if is_pro, assign federation number
            $user->federation_number = $request->federation_number;
        } else {
            //assign insurer cif to user
            $user->insurer_cif = $request->insurer_cif;
        }
        $user->paid = 1;
        $user->save();

        return redirect()->route('home');
    }
}