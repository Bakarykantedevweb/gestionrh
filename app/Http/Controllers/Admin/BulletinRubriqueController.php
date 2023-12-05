<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BulletinRubriqueController extends Controller
{
    public function index()
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'bulletin-rubrique.index');
        if ($autorisation == 'false') {
            toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect()->route('dashboard');
        }

        return view('admin.bulletin-rubrique.index');
    }
}
