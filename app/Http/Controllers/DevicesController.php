<?php

namespace App\Http\Controllers;

use DB;
use App\Modeles;
use App\Device;
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
        $devices = Device::with('modele.category','modele.brand')->get();


        $leftmenu['devices'] = 'active';
        return view('/devices/index', ['leftmenu' => $leftmenu, 'devices' => $devices]);

    }
    public function handleAction(Request $request)
    {
        $action = $request->input('_action');

        if( $action == 'addDevice' )
        {
            $this->validate($request, [
                'serial_number' => 'unique:devices',
            ]);
            $date = Device::convertDate($request->input('purchased_at'));
            $id = DB::table('devices')->insertGetId(
                ['serial_number' => $request->input('serial_number'),
                 'purchased_at'  => $date,
                 'model_id'      => $request->input('model_id')
                ]);
            //Device::create( $request->all() );
            return response(['status' => 'success', 'new_added_id' => $id]);
        }
        else
        {
            return response(['status' => 'error']);
        }
    }
}
