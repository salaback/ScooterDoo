<?php

namespace App\Http\Controllers;

use App\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{

    public function resetdb()
    {
        Artisan::call("migrate:refresh");

        Artisan::call("db:seed");

        return redirect('/');

    }

    public function dashboard()
    {
        $stations = Station::all();
        $stations->load('carts');

        return view('dashboard', compact('stations'));
    }

}
