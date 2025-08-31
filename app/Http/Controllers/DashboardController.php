<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke__()
    {

        return view('dashboard_views.dashboard');
    }
}
