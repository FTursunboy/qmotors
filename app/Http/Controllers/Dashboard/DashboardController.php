<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.index');
    }

    public function index1()
    {
        return view('dashboard.pages.dashboard.version-1');
    }
}
