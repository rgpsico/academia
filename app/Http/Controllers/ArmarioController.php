<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArmarioController extends Controller
{
    public function index()
    {
        return view('admin.armario.index');
    }
}
