<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClassificationController extends Controller
{
    public function index()
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'classification.index');
        if ($autorisation == 'false') {
            toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect('admin/404');
        }
        return view('admin.classification.index');
    }
}
