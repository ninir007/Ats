<?php

namespace App\Http\Controllers;

use App\GroupStatus;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GroupStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $groups = GroupStatus::all();
        $leftmenu['status'] = 'active';
        return view('/status/index', ['groups' => $groups, 'leftmenu' => $leftmenu]);

    }
}
