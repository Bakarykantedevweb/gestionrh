<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserManagementController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_type_user->id != 2 AND Auth::user()->role->id != 1) {
            toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect('admin/404');
        }
        if (Auth::user()->role_type_user_id == 2and Auth::user()->role->id == 1) {
            // $result      = User::all();
            // $role_name   = DB::table('role_type_users')->get();
            // $sites        = DB::table('sites')->get();
            // $roles         = Role::where('type', 1)->get();
            return view('admin.user.index');
        } else {
            return redirect()->route('dashboard');
        }
    }
}
