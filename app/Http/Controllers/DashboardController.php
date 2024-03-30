<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index');
    }

    public function properties()
    {
        return view('dashboard.properties.index');
    }


    public function units()
    {
        return view('dashboard.units.index');
    }

    public function transactions()
    {
        return view('dashboard.transactions.index');
    }

    public function applications()
    {
        return view('dashboard.applications.index');
    }

    public function reports()
    {
        return view('dashboard.reports.index');
    }

    public function bookmarks()
    {
        return view('dashboard.bookmarks.index');
    }
}
