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
        $leftmenu['status-groups'] = 'active';

        return view('/status/groups', ['groups' => $groups, 'leftmenu' => $leftmenu]);

    }


    public function handleAction(Request $request)
    {

        $action = $request->input('_action');


        if( $action == 'addGroupStatus' )
        {
            GroupStatus::create( $request->all() );
            return response(['status' => 'success']);
        }


        if( $action == 'editGroupStatus' )
        {
            $id = $_POST['id'];

            $group = GroupStatus::find($id);
            $group->label  = $_POST['label'];
            $group->save();


            return response(['status' => 'success']);

        }

    }
}
