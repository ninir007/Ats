<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Modeles;
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
        $modele = Modeles::with('category', 'brand')->get();

        $articles_modeles = Modeles::with('articles')->get();


        $leftmenu['model'] = 'active';
        $leftmenu['model_gerer'] = 'active';
        return view('/modeles/index', ['leftmenu' => $leftmenu,
                                        'categories' => $categories,
                                        'brands' => $brands,
                                        'modeles' => $modele,
                                        'artmod' => $articles_modeles
                                      ]);

    }


    public function handleAction(Request $request)
    {

        $action = $request->input('_action');


        if( $action == 'addModel' )
        {
            $this->validate($request, [
                'name' => 'unique:models',
            ]);

            Modeles::create( $request->all() );
            return response(['status' => 'success']);
        }
        else
        {
            return response(['status' => 'error']);
        }


    }



}
