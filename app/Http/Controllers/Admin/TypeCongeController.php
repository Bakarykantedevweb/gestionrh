<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeCongeController extends Controller
{
    public function index()
    {
        return view('admin.type_conge.index');
    }
}
