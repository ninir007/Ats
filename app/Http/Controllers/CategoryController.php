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

            $this->validate($request, [
                'name' => 'unique:categories',
            ]);

            Category::create($request->all());
            return response(['status' => 'success']);
        }
        else if ($action == 'addBrand') {

            $this->validate($request, [
                'name' => 'unique:brands',
            ]);

            Brand::create($request->all());
            return response(['status' => 'success']);
        }
        else
        {
            return response(['status' => 'error']);

        }
    }

}
