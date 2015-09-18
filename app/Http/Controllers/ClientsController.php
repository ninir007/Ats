<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repo\ClientRepo;

class ClientsController extends Controller
{



    public function index()
    {
        return view('clients');

    }
    public function handleAction(Request $request,
                                 ClientRepo $clientrepository)
    {
        $action = $request->input('_action');
        if( $action == 'createClient' ) {

            App\Client::create( $request->all() );
            return redirect()->back();
        }
        return view('clients');

    }


}
