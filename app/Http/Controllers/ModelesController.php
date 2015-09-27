<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
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


        $leftmenu['model'] = 'active';
        $leftmenu['model_menu'] = 'collapse in';
        return view('/modeles/index', ['leftmenu' => $leftmenu, 'categories' => $categories, 'brands' => $brands]);

    }


    public function handleAction(Request $request)
    {

        $action = $request->input('_action');


        if( $action == 'addCategory' )
        {
            Category::create( $request->all() );
            return response(['status' => 'success']);
        }
        if( $action == 'addBrand' )
        {
            Brand::create( $request->all() );
            return response(['status' => 'success']);
        }


    }



}
