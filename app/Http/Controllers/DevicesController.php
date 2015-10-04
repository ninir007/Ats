<?php

namespace App\Http\Controllers;

use App\Modeles;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DevicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $modele = Modeles::all();

        $leftmenu['devices'] = 'active';
        return view('/devices/index', ['leftmenu' => $leftmenu, 'modeles' => $modele]);

    }
    public function handleAction(Request $request)
    {
        $action = $request->input('_action');

        if( $action == '' )
        {

        }
    }
}
