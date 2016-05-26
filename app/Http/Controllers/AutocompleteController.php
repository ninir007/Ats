<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Autocomplete;

class AutocompleteController extends Controller
{

    public function index(Request $req)
    {

        $response = Autocomplete::getSuggestion($req->all());

        if($response != []) {
            return response($response);

        }
        else {
            return response($response, 404);

        }

    }
}
