<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }
    public function makeAdmin($user_id)
    {
        $user = User::find($user_id);

    if ($user) {
        $user->role = 'admin';
        $user->save();
        return redirect()->back()->with('success', 'User is now an admin.');
    }

    return redirect()->back()->with('error', 'User not found.');
    }
}
