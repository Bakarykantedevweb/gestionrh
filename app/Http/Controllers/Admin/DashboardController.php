<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Contact;
use App\Models\Contrat;
use App\Models\Departement;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contacts = Contact::where('status', '0')
            ->whereDate('created_at', '<=', now())
            ->orderBy('id', 'DESC')
            ->limit(5)
            ->get();
        return view('admin.dashboard', compact('contacts'));
    }

    public function inbox()
    {
        $contacts = Contact::where('status', '0')
            ->whereDate('created_at', '<=', now())
            ->orderBy('id', 'DESC')
            ->limit(5)
            ->get();
        return view('admin.inbox', compact('contacts'));
    }

    public function page404()
    {
        return view('admin.404');
    }
}
