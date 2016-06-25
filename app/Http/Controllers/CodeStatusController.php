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
            $this->validate($request, [
                'label' => 'required|unique:codes_status',
            ]);
            CodeStatus::create( $request->all() );
            flash()->success('Opération réussie!', 'Code créé avec succés.');
        }

        if( $action == 'editCode' )
        {
            $id = $_POST['editid'];
            $code_status = CodeStatus::find($id);
            $code_status->label             = $_POST['label'];
            $code_status->group_status_id   = $_POST['group_status_id'];
            $code_status->step              = $_POST['step'];
            $code_status->description       = $_POST['description'];

            $code_status->save();
            flash()->success('Opération réussie!', 'Code Statut modifé avec succés.');
        }


        return redirect('/status/codes');
    }
}
