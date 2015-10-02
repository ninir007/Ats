<?php

namespace App\Http\Controllers;

use App\Models;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $modele = Models::all();
        $articles = Article::with('model')->get();

        $leftmenu['model'] = 'active';
        $leftmenu['model_article'] = 'active';
        return view('/articles/index', ['leftmenu' => $leftmenu, 'modeles' => $modele, 'articles' => $articles]);

    }
    public function handleAction(Request $request)
    {
        $action = $request->input('_action');

        if( $action == 'addArticle' )
        {
            Article::create( $request->all() );
            return response(['status' => 'success']);
        }
    }
}
