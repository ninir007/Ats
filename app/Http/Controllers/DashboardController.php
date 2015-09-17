<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class DashboardController  extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDashboard(Request $request)
    {

        return view( 'dashboard');
    }


}