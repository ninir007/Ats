<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Supplier;
use App\Article;
use App\ArticlesSuppliers;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class SuppliersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $supp = Supplier::all();

        $leftmenu['supplier'] = 'active';
        return view('/suppliers/index', ['suppliers' => $supp, 'leftmenu' => $leftmenu]);
    }

    public function supplierDetails($id)
    {
        $supp = Supplier::where('id', $id)->with('articles')->first();
        $articles_supplier = Article::where('supplier_id' , $id)->get();
        if(! isset($supp->id)){
            return redirect('/404');

        }
        else{
            $leftmenu['supplier'] = 'active';
            $articles = Article::all();

        }

        return view('/suppliers/details', ['supp' => $supp, 'leftmenu' => $leftmenu, 'articles' => $articles, "articles_supplier" => $articles_supplier]);
    }


    public function supplierHandle(Request $req)
    {
        $action = $req->input('_action');


        if( $action == 'editSupplier' )
        {

            $id = $req['id'];
            $client = Supplier::find($id);
            $client->name       = $_POST['name'];
            $client->contact      = $_POST['contact'];
            $client->email = $_POST['email'];
            $client->street = $_POST['street'];
            $client->postal_code = $_POST['postal_code'];
            $client->city = $_POST['city'];
            $client->vat = $_POST['vat'];
            $client->mobile = $_POST['mobile'];
            $client->office = $_POST['office'];
            $client->fax = $_POST['fax'];

            $client->save();
            return response(["status" => "success", "redirect" => "/suppliers/".$id]);
        }
        else {

        }




    }
    public function handleAction(Request $request)
    {

        $action = $request->input('_action');


        if( $action == 'createSupplier' )
        {
            //Creation :
            Supplier::create( $request->all() );

            // FLash messaging :
                flash()->success('Opération réussie!', 'Fournisseur créé avec succès.');

        }
        else if($action == 'addArt')
        {
            try {

                $this->validate($request, [
                    'reference' => 'unique:articles',
                ]);
                Article::create( $request->all() );
            }
            catch(\Exception $e){
                return response(['status' => 'doublon'], 500);
            }


            return response(['status' => 'success']);
        }
        else
        {

        }


        return redirect('/suppliers');

    }




}
