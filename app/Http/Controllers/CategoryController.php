<?php

namespace App\Http\Controllers;


use App\Category;
use App\Brand;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
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
        $leftmenu['model_cat'] = 'active';
        return view('/category-brand/index', ['leftmenu' => $leftmenu, 'categories' => $categories, 'brands' => $brands]);

    }


    public function handleAction(Request $request)
    {

        $action = $request->input('_action');


        if ($action == 'addCategory') {
            Category::create($request->all());
            return response(['status' => 'success']);
        }
        if ($action == 'addBrand') {
            Brand::create($request->all());
            return response(['status' => 'success']);
        }
    }

}
