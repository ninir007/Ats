<?php

namespace App\Http\Controllers;

use App\Modeles;
use App\Article;
use App\Supplier;
use App\ArticlesSuppliers;
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
        $supp = Supplier::all();
        $articles_modeles = Article::with('theModels.brand', 'theModels.category', 'supplier')->get();

        $leftmenu['model'] = 'active';
        $leftmenu['model_article'] = 'active';
        return view('/articles/index', ['leftmenu' => $leftmenu, 'modeles' => $modele, 'article_modele' => $articles_modeles, 'suppliers' => $supp]);
    }
    public function handleAction(Request $request)
    {
        $action = $request->input('_action');

        if( $action == 'addArticle' )
        {
            $this->validate($request, [
                'reference' => 'unique:articles',
            ]);

            try {

                Article::create( $request->all() );
                return response(['status' => 'success']);
            }
            catch(\Exception $e){
                return response(['status' => 'error'], 500);
            }

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
        else if( $action == 'getArticlesBySupplier')
        {
            $articles = Article::where(['supplier_id' => $request['supplier_id']])->get();

            return response(['status' => 'success', 'list'=> $articles]);
        }
        else if( $action == 'getModeles')
        {
            $id = $request['_id'];
            $article_details = Article::where('id',$id)->with('theModels.brand', 'theModels.category')->first();

            $details =   $article_details->toArray();
            return view('/articles/modeles_array', ['details' => $details]);
        }
        else
        {
            return response(['status' => 'error']);
        }
    }
}
