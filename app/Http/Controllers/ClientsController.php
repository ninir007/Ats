<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $clients = Client::all();

        $leftmenu['client'] = 'active';
        return view('/clients/clients', ['clients' => $clients, 'leftmenu' => $leftmenu]);

    }


    public function handleAction(Request $request)
    {

        $action = $request->input('_action');


        if( $action == 'createClient' )
        {
            //Creation :
            Client::create( $request->all() );

            // FLash messaging :
                flash()->success('Opération réussie!', 'Client créé avec succès.');

        }
        else if( $_POST['_action'] == 'getClientByID')
        {
            $id = $_POST['_uid'];
            $client = Client::where('id', $id)->with('files')->first();
            return response(['status' => 'success', 'client' => $client], 200);
        }
        else if( $_POST['_action'] == 'editClient')
        {
            $id = $_POST['id'];
            $client = Client::find($id);
            $client->lastname       = $_POST['lastname'];
            $client->firstname      = $_POST['firstname'];
            $client->email = $_POST['email'];
            $client->street = $_POST['street'];
            $client->postal_code = $_POST['postal_code'];
            $client->city = $_POST['city'];
            $client->vat = $_POST['tva'];
            $client->mobile = $_POST['mobile'];
            $client->office = $_POST['office'];
            $client->fax = $_POST['fax'];

            $client->save();
            flash()->success('Opération réussie!', 'Client modifé avec succès.');
        }
        else
        {

        }






        return redirect('/clients');

    }




}
