<?php

namespace App\Http\Controllers;

use App\Client;
use App\Modeles;
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
        $leftmenu['files'] = 'active';

        return view('/files/index', ['leftmenu' => $leftmenu]);
    }

    public function create($id)
    {

        $client = Client::where('id', $id)->get();
        $modele = Modeles::with('category', 'brand')->get();


        $leftmenu['files'] = 'active';
        return view('/files/create', ['leftmenu' => $leftmenu, 'client' => $client[0], 'modeles' => $modele]);
    }

}
