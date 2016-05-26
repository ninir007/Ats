<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\User;
use App\Client;
use App\Repair;
use App\File;
use App\Modeles;
use App\Device;
use App\Article;
use App\Supplier;
use App\Order;
use App\CodeStatus;
use App\OrderDetails;
use App\Category;
use App\Brand;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function editOrder($id)
    {
        $files = File::with('client', 'technicien')->get()->find($id);
        if( empty($files))
        {
            return redirect('/404');
        }
        $order = Order::where('file_id', $files['id'])->with('details')->first();
        $details = OrderDetails::where('file_id', $files['id'])->with('supplier', 'article')->get();
        $order['order_details'] = $details;
        $status = CodeStatus::with('group')->get();
        $supp = Supplier::all();
        $articles = Article::all();
//        $order["modele"] =  Modeles::where('id', $order['device']['model_id'])->with('category', 'brand')->get();
        $leftmenu['files'] = 'active';
        return view('/files/edit-order', [ 'leftmenu' => $leftmenu, 'files' => $files, 'orders' => $order, 'code_status' => $status, 'suppliers'   => $supp, 'articles'   => $articles,]);
    }

    public function editRepair($id)
    {
        $files = File::with('client', 'technicien')->get()->find($id);
        if( empty($files))
        {
            return redirect('/404');
        }
        //$files = File::with('client', 'technicien')->get();
        $repairs = Repair::where('file_id', $files['id'])->with('device')->first();
        $repairs["modele"] =  Modeles::where('id', $repairs['device']['model_id'])->with('category', 'brand')->get();
        $status = CodeStatus::with('group')->get();

        $leftmenu['files'] = 'active';
        return view('/files/edit-repair', [ 'leftmenu' => $leftmenu, 'files' => $files, 'repairs' => $repairs, 'code_status' => $status ]);
    }


    public function index()
    {
        $files = File::with('client', 'technicien')->get();
        $repairs = Repair::with('device')->get();
        $orders = Order::all();

        $leftmenu['files'] = 'active';
        return view('/files/index', [ 'leftmenu' => $leftmenu, 'files' => $files, 'repairs' => $repairs,'orders' => $orders ]);
    }

    public function create($id)
    {

        $client = Client::where('id', $id)->get();
        $modele = Modeles::with('category', 'brand')->get();
        $devices = Device::all();

        $leftmenu['files'] = 'active';
        return view('/files/create', [
            'leftmenu'  => $leftmenu,
            'client'    => $client[0],
            'modeles'   => $modele,
            'devices'   => $devices
        ]);
    }

    public function createFile($id)
    {
        $users = User::all();
        $client = Client::where('id', $id)->get();
        $modele = Modeles::with('category', 'brand', 'articles')->get();
        $devices = Device::all();
        $articles = Article::all();
        $supp = Supplier::all();
        $categories = Category::all();
        $brands = Brand::all();

        $leftmenu['files'] = 'active';
        return view('/files/create-by-id', [
            'leftmenu'  => $leftmenu,
            'client'    => $client[0],
            'modeles'   => $modele,
            'devices'   => $devices,
            'articles'   => $articles,
            'suppliers'   => $supp,
            'categories' => $categories,
            'brands' => $brands,
            'users'     => $users
        ]);
    }

    public function handleAction(Request $request)
    {
        $action = $request->input('_action');

        if( $action == 'addDevice' )
        {
            $this->validate($request, [
                'serial_number' => 'unique:devices',
            ]);
            $date = Device::convertDate($request->input('purchased_at'));
            $id = DB::table('devices')->insertGetId(
                ['serial_number' => $request->input('serial_number'),
                    'description'   => $request->input('description'),
                    'purchased_at'  => $date,
                    'model_id'      => $request->input('model_id')
                ]);
            //Device::create( $request->all() );
            return response(['status' => 'success', 'new_added_id' => $id]);
        }
        else if( $action == 'createRepair')
        {
            if($request['device_id'] != '') {
                $id = File::create( $request->all() )->id;
                Repair::create(['file_id' => $id, 'device_id' => $request->input('device_id') , 'accessory' => $request->input('accessory')]);
                $leftmenu['files'] = 'active';

                return response(['status' => 'success']);
            }
            else {
                return response( ['status' => 'error'] );
            }

        }
        else if( $action == 'createOrder')
        {
            $order_details = ( session()->has('order_details')) ? session('order_details') : false;
            if($order_details) {

                $id = File::create( $request->all() )->id;
                Order::create(["file_id" => $id, "total" => $order_details['total']]);

                foreach($order_details as $order_item)  {
                    if(isset($order_item['price'])) {
                        OrderDetails::create(["file_id" => $id, "supplier_id" => $order_item['supplier_id'] , "article_id" => $order_item['article_id'], "price" => $order_item['price'], "quantity" => $order_item['quantity']]);
                    }
                }
                $request->session()->forget('order_details');
                return response(['status' => 'success', 'redirect' => '/file/order/'.$id]);
            }
            return response(['status' => 'error']);

        }
        else if( $action == 'calculateOrder')
        {
            $list = json_decode($request['_params'],true);

            $response = Order::calculateTotal($list['orders']);
            $list['orders']['total'] = $response;
            ($response != 0) ? Session::put('order_details', $list['orders']) : '';
            $response = ($response != 0) ? ['status' => 'success', 'total' => $response] : ['status' => 'error'] ;
            return response($response);

        }
        else
        {
            return response(['status' => 'error']);
        }
    }
}
