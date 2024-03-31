<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function default()
    {
        return view('frontend.index');
    }
    public function guest()
    {
        return view('index');
    }
    public function landlordDashboard()
    {
        return view('landlord.dashboard.index');
    }
}
