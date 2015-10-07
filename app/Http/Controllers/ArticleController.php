<?php

namespace App\Http\Controllers;

use App\Modeles;
use App\Article;
use App\ModeleArticle;
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
        $modele = Modeles::with('category', 'brand')->get();

        $articles_modeles = Article::with('theModels')->get();

        $leftmenu['model'] = 'active';
        $leftmenu['model_article'] = 'active';
        return view('/articles/index', ['leftmenu' => $leftmenu, 'modeles' => $modele, 'article_modele' => $articles_modeles]);

    }
    public function handleAction(Request $request)
    {
        $action = $request->input('_action');

        if( $action == 'addArticle' )
        {
            $this->validate($request, [
                'reference' => 'unique:articles',
            ]);

            Article::create( $request->all() );
            return response(['status' => 'success']);
        }
        else if( $action == 'addModArt')
        {
            try {

                ModeleArticle::create( $request->all() );
            }
            catch(\Exception $e){
                return response(['status' => 'doublon'], 500);
            }


            return response(['status' => 'success']);
        }
        else
        {
            return response(['status' => 'error']);

        }
    }
}
