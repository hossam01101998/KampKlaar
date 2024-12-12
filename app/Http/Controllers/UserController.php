<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    public function index()
    {
        $users = User::get();  // Haalt alle gebruikers op
        return view('users.index', compact('users'));  // Geeft de gebruikers door aan de view
    }
    public function show($id)
    {
        $user = User::findOrFail($id);  // Haalt een specifieke gebruiker op
        return view('users.show', compact('user'));
    }

}
