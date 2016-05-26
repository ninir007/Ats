<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Supplier;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class SuppliersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $supp = Supplier::all();

        $leftmenu['supplier'] = 'active';
        return view('/suppliers/index', ['suppliers' => $supp, 'leftmenu' => $leftmenu]);
    }


    public function handleAction(Request $request)
    {

        $action = $request->input('_action');


        if( $action == 'createSupplier' )
        {
            //Creation :
            Supplier::create( $request->all() );

            // FLash messaging :
                flash()->success('Opération réussie!', 'Fournisseur créé avec succès.');

        }
        else
        {

        }


        return redirect('/suppliers');

    }




}
