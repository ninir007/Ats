<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Models;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ModelesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $modele = Models::with('category', 'brand')->get();

        $leftmenu['model'] = 'active';
        $leftmenu['model_gerer'] = 'active';
        return view('/modeles/index', ['leftmenu' => $leftmenu, 'categories' => $categories, 'brands' => $brands, 'modeles' => $modele]);

    }


    public function handleAction(Request $request)
    {

        $action = $request->input('_action');


        if( $action == 'addModel' )
        {
            Models::create( $request->all() );
            return response(['status' => 'success']);
        }


    }



}
