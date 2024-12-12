<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{


    public function show()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('profile')->with('error', 'User not found');
    }

    $request->validate([
        'username' => 'required|string|max:100|unique:users,username,' . $user->user_id,
        'email' => 'required|email|max:255|unique:users,email,' . $user->user_id,
    ]);

    $user->username = $request->input('username');
    $user->email = $request->input('email');

    $userSaved = $user->save();

        if ($userSaved) {
            return redirect()->route('profile')->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->route('profile')->with('error', 'Failed to update profile.');
        }

    return redirect()->route('profile')->with('success', 'Profile updated successfully.');
}
}
