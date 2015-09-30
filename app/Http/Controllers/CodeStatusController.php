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
        $groups = GroupStatus::all();
        $codes = CodeStatus::with('group')->get();
        $leftmenu['status'] = 'active';
        $leftmenu['status-codes'] = 'active';

        return view('/status/codes', ['codes' => $codes, 'groupes' => $groups, 'leftmenu' => $leftmenu]);
    }
    public function handleAction(Request $request)
    {
        $action = $request->input('_action');


        if( $action == 'addCode' )
        {
            CodeStatus::create( $request->all() );
            flash()->success('Opération réussie!', 'Code créé avec succés.');
        }



        return redirect('/status/codes');
    }
}
