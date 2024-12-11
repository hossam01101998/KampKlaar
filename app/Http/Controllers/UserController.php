<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();  // Haalt alle gebruikers op
        return view('home', compact('users'));  // Geeft de gebruikers door aan de view
    }

    public function show($id)
    {
        $user = User::findOrFail($id);  // Haalt een specifieke gebruiker op
        return view('home', compact('user'));
    }

    
}
