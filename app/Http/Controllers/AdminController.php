<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{

   /* public function __construct()
    {
        $this->middleware('isadmin');
    }*/

    /*public function index()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }*/

    public function makeAdmin($user_id)
    {
        if (\Illuminate\Support\Facades\Auth::check()) {
            $authenticatedUser = \Illuminate\Support\Facades\Auth::user();

            if ($authenticatedUser->isadmin) {

                $user = User::findOrFail($user_id);

                //dd($user);

                $user->isadmin = true;
                $user->save();

                return redirect()->back()->with('status', 'User with ID ' . $user->user_id . ' is now an admin!');

            }

            return redirect()->back()->with('error', 'You are not authorized to make this change.');
        }

        return redirect()->route('login')->with('error', 'You need to log in first.');
    }

    public function removeAdmin($user_id)
    {
        if (\Illuminate\Support\Facades\Auth::check()) {
            $authenticatedUser = \Illuminate\Support\Facades\Auth::user();

            if ($authenticatedUser->isadmin) {

                $user = User::findOrFail($user_id);

                if ($user->isadmin) {

                    $user->isadmin = false;
                    $user->save();

                    return redirect()->back()->with('status', 'User with ID ' . $user->user_id . ' is no longer an admin.');
                }

                return redirect()->back()->with('error', 'This user is not an admin.');
            }

            return redirect()->back()->with('error', 'You are not authorized to make this change.');
        }

        return redirect()->route('login')->with('error', 'You need to log in first.');
    }

    public function deleteUser($user_id)
{
    if (\Illuminate\Support\Facades\Auth::check()) {
        $authenticatedUser = \Illuminate\Support\Facades\Auth::user();

        if ($authenticatedUser->isadmin) {
            $user = User::findOrFail($user_id);

            $user->delete();

            return redirect()->back()->with('status', 'User with ID ' . $user->user_id . ' has been deleted successfully.');
        }

        return redirect()->back()->with('error', 'You are not authorized to delete users.');
    }

    return redirect()->route('login')->with('error', 'You need to log in first.');
}


}
