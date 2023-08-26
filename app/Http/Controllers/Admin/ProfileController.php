<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function updateprofile(Request $request)
    {
        $request->validate([
            'telephone' => ['required', 'regex:/^\+?[0-9]{8,15}$/'],
            'password' =>['required', 'confirmed', 'min:8'],
            'adresse' => 'required|string',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension($file);
            $filename = time() . '.' . $ext;
            $file->move('uploads/admin/profile/', $filename);

            // $category->image = $filename;

            User::where('id', Auth::user()->id)->update([
                'telephone' => $request->telephone,
                'adresse' => $request->adresse,
                'password' => $request->password,
                'photo' => $filename
            ]);
        }

    }
}
