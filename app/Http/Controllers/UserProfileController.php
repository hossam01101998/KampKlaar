<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{


    public function show()
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $user = Auth::user();
        $reservations = $user->reservations()->orderBy('created_at', 'desc')->get();

       // dd($user->photo);

        //dd($reservations);

        return view('profile.index', compact('user', 'reservations'));
    }

    public function edit()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

   //dd($request);


    $user = Auth::user();

    if (!$user) {
        return redirect()->route('profile')->with('error', 'User not found');
    }

   // dd($user);


    if ($request->hasFile('photo')) {
        $photo = $request->file('photo');
        $photoName = time() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('images/profile_photos'), $photoName);
        $user->photo = 'images/profile_photos/' . $photoName;
    }




   $request->validate([
    'username' => 'required|string|max:100|unique:users,username,' . $user->user_id . ',user_id',
    'email' => 'required|email|max:255|unique:users,email,' . $user->user_id . ',user_id',
    // for phone number we use regex.
    'phone' => 'nullable|regex:/^\+?[0-9]{8,15}$/|max:15|unique:users,phone,' . $user->user_id . ',user_id',
    //'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //'photo' => 'nullable|image,',

]);


    $user->username = $request->input('username');
    $user->email = $request->input('email');
    $user->phone = $request->input('phone') ?? null;



    $userSaved = $user->save();


if ($userSaved) {
    return redirect()->route('profile')->with('success', 'Profile updated successfully.');
} else {
    return redirect()->route('profile')->with('error', 'Failed to update profile.');
}
}
}
