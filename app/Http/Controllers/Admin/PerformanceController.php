<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PerformanceController extends Controller
{
    public function index()
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'performance.index');
        if ($autorisation == 'false') {
            toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect()->route('dashboard');
        }

        return view('admin.performance.index');
    }
}
