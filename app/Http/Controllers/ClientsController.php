<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repo\ClientRepo;

class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $clients = Client::all();
        return view('clients', ['clients' => $clients]);

    }
    public function handleAction(Request $request)
    {
        $action = $request->input('_action');


        if( $action == 'createClient' )
        {
            //Creation :
            Client::create( $request->all() );

            // FLash messaging :
                flash()->success('Opération réussie!', 'Client créé avec succés.');
            // back to creation form.
            return redirect()->back();

        }




        return view('clients');

    }


}
