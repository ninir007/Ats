<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use App\File;
use App\CodeStatus;



class DashboardController  extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDashboard(Request $req)
    {

        $leftmenu['dashboard'] = 'active';

        $files = File::with('client', 'technicien', 'laststatus.code.group', 'laststatus.technicien')->get();

        $files =  CodeStatus::getThemAllLastStatus($files->toArray());


        return view('dashboard', ['leftmenu' => $leftmenu, 'files' => $files]);
    }


}