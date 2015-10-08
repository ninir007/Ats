<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Client;
use App\Repair;
use App\File;
use App\Modeles;
use App\Device;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $files = File::with('client', 'technicien')->get();
        $list = File::all();
        $leftmenu['files'] = 'active';
        return view('/files/index', [ 'leftmenu' => $leftmenu, 'files' => $files, 'list' => $list ]);
    }

    public function create($id)
    {

        $client = Client::where('id', $id)->get();
        $modele = Modeles::with('category', 'brand')->get();
        $devices = Device::all();


        $leftmenu['files'] = 'active';
        return view('/files/create', [
            'leftmenu'  => $leftmenu,
            'client'    => $client[0],
            'modeles'   => $modele,
            'devices'   => $devices
        ]);
    }

    public function createFile($id)
    {
        $users = User::all();
        $client = Client::where('id', $id)->get();
        $modele = Modeles::with('category', 'brand')->get();
        $devices = Device::all();


        $leftmenu['files'] = 'active';
        return view('/files/create-by-id', [
            'leftmenu'  => $leftmenu,
            'client'    => $client[0],
            'modeles'   => $modele,
            'devices'   => $devices,
            'users'     => $users
        ]);
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
                    'description'   => $request->input('description'),
                    'purchased_at'  => $date,
                    'model_id'      => $request->input('model_id')
                ]);
            //Device::create( $request->all() );
            return response(['status' => 'success', 'new_added_id' => $id]);
        }
        else if( $action == 'addFile')
        {



            $id = Repair::create(['device_id' => $request->input('device_id') , 'accessory' => $request->input('accessory')])->id;
            $request['represent_id'] = $id;
            File::create( $request->all() );

            $leftmenu['files'] = 'active';

            return response(['status' => 'success']);

        }
        else
        {
            return response(['status' => 'error']);
        }
    }

}
