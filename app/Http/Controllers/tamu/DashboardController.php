<?php

namespace App\Http\Controllers\tamu;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('tamu.dashboard');
    }
}
