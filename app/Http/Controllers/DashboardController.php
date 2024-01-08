<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //dashboard
    public function index()
    {

        if (Gate::Allows('IsAdministrator'))
        {
            $varNama = Auth()->user()->name;
            return view('dashboard.index', compact('varNama'));
        }else{
            echo "Anda Bukan Admin";
        }
        // return view('dashboard.index');
    }
}
