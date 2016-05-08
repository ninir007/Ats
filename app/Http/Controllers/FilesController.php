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


    public function editRepair($id)
    {
        $files = File::with('client', 'technicien')->get()->find($id);
        if( empty($files))
        {
            return redirect('/404');
        }
        //$files = File::with('client', 'technicien')->get();
        $repairs = Repair::where('file_id', $files['id'])->with('device')->first();
        $repairs["modele"] =  Modeles::where('id', $repairs['device']['model_id'])->with('category', 'brand')->get();
        $leftmenu['files'] = 'active';
        return view('/files/edit-repair', [ 'leftmenu' => $leftmenu, 'files' => $files, 'repairs' => $repairs ]);
    }


    public function index()
    {
        $files = File::with('client', 'technicien')->get();
        $repairs = Repair::with('device')->get();

        $leftmenu['files'] = 'active';
        return view('/files/index', [ 'leftmenu' => $leftmenu, 'files' => $files, 'repairs' => $repairs ]);
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

            $id = File::create( $request->all() )->id;

            Repair::create(['file_id' => $id, 'device_id' => $request->input('device_id') , 'accessory' => $request->input('accessory')]);
            $request['represent_id'] = $id;

            $leftmenu['files'] = 'active';

            return response(['status' => 'success']);

        }
        else
        {
            return response(['status' => 'error']);
        }
    }

}
