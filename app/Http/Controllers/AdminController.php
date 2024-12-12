
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
    public function makeAdmin($id)
    {
        $user = User::find($id);
        $user->role === 'admin';
        $user->save();
        return redirect()->back()->with('success', 'User is now an admin.');
    }
}
