<?php

namespace App\Http\Controllers;

use App\GroupStatus;
use App\CodeStatus;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CodeStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $codes = CodeStatus::all();
        $groups = GroupStatus::all();
        $leftmenu['status'] = 'active';
        $leftmenu['status-codes'] = 'active';

        return view('/status/codes', ['codes' => $codes, 'groupes' => $groups, 'leftmenu' => $leftmenu]);
    }
}
