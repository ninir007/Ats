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
use App\Invoice;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function invoiceOrder($id , Request $req)
    {
        $order = File::where('id', $id)->with('order.details.article', 'client')->first();
        $num = $id * 12;
        $invoice = Invoice::firstOrNew(['file_id' => $id]);
        if(! isset($invoice['id'])) {
            $invoice['created_at'] = date("d-m-Y");
            $invoice->save();
        }

        return view('/files/invoice-order', ['order' => $order, 'invoice' => $invoice]);
    }
    public function searchFile(Request $req)
    {
        $action = $req->input('_action');
        if($action == "massiveSearch")
        {
            $id =  strtoupper($req['top_search']) ;
            if(strpos($id, 'R') !== false) {
               $id =  substr($id,0 ,strpos($id, 'R'));
                try {
                    $user = File::where('id', $id)->firstOrFail();
                    return  redirect("/file/repair/".$id);
                } catch (ErrorException $e) {
                    return redirect("/dashboard");
                }
            }
            else if(strpos($id, 'O') !== false) {
                $id =  substr($id,0 ,strpos($id, 'O'));
                try {
                    $user = File::where('id', $id)->firstOrFail();
                    return  redirect("/file/order/".$id);
                } catch (ErrorException $e) {
                    return redirect("/dashboard");
                }
            }
            else {
               return abort(404);
            }
        }
    }

    public function handleFile($id, Request $req)
    {
        $action = $req->input('_action');

        if( $action == 'updateFile' )
        {
            $params = ["client_report" => $req['client_report'], "intern_report" => $req['intern_report']];

            $ok = File::where('id', $id)->update($params);
            if($ok) {
                $stamp = date('d/m/Y, H:i:s');
                return ['status' => "success", "stamp" => $stamp];
            }
            else
            {
                return ['status' => "error"];
            }
        }
        else if( $action == 'calculateInvoice') {

            $total = Order::calculateInvoice($req);
            if(isset($req['advance_amount'])) {
                $file = File::find($id)->update(['advance_amount' => $req['advance_amount'], 'part_amount' => $total, 'part_vat' => $req['part_vat']]);
                $response['remaining'] =  $total - $req['advance_amount'] ;
                $response['total'] = $total;
            }


            $response = (isset($response)) ? ['status' => 'success', 'invoice' => $response] : ['status' => 'error'] ;
            return response($response);
        }

        else {

        }
    }


    public function deleteOrder($id, Request $req)
    {

        $todelete = OrderDetails::find($req['order_detail_id']);
        $totaled = $todelete->price * $todelete->quantity;
        $deleted = $todelete->delete();


        if($deleted) {

            //UPDATE TOTAL
            $order = Order::where("file_id" , $id)->first();
            $sum = $order->total - $totaled;

            $order = Order::where(["file_id" => $id])->update(['total' => $sum]);

            $stamp = date('d/m/Y, H:i:s');

            $res = ["status" => "success", "stamp" => $stamp, 'sum' => $sum];
        }
        else $res = ["status" => "error"];

        return $res;

    }



    public function updateOrder($id, Request $req)
    {

        if(isset($req['article_id'])) {
            $total = 0;

            //UPDATE DETAIL & CALCULATE TOTAL
            foreach($req['article_id'] as $key => $article) {
                $detail = OrderDetails::firstOrCreate(['file_id' => $id, 'article_id' => $article]);
                $detail->price = $req["price"][$key];
                $detail->quantity = $req["quantity"][$key];

                $detail->save();
                $total += $req["price"][$key] * $req["quantity"][$key];
                $response[$req["supplier_id"][$key]."-".$article] = $detail->id;
            }
            //UPDATE TOTAL
            $order = Order::where(["file_id" => $id]);

            $order->update(['total_details_amount' => $total]);
            File::find($id)->touch();

        }
        $stamp = date('d/m/Y, H:i:s');
        return ["status" => "success", "new" => $response, "stamp" =>$stamp, 'sum' => $total];
    }

    public function editOrder($id)
    {
        $files = File::with('client', 'technicien')->get()->find($id);
        if( empty($files))
        {
            return redirect('/404');
        }
        $order = Order::where('file_id', $files['id'])->with('details')->first();
        $details = OrderDetails::where('file_id', $files['id'])->with('article.supplier')->get();
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
                Repair::create(['file_id' => $id, 'device_id' => $request->input('device_id') , 'accessory' => $request->input('accessory'), 'description'   => $request->input('description'),]);
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
                Order::create(["file_id" => $id, "total_details_amount" => $order_details['total']]);

                foreach($order_details as $order_item)  {
                    if(isset($order_item['price'])) {
                        OrderDetails::create(["file_id" => $id, "article_id" => $order_item['article_id'], "price" => $order_item['price'], "quantity" => $order_item['quantity']]);
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
