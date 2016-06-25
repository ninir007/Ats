<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Auth;
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
use App\RepairDetails;
use App\Category;
use App\Brand;
use App\Invoice;
use App\StatusFile;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FilesController extends Controller
{
    private $num = 0;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function formOrder($id)
    {
        $order = File::where('id', $id)->with('order.details.article', 'client')->first();


        return view('/pdf/form-order', ['order' => $order]);
    }
    public function invoiceOrder($id , Request $req, Invoice $invoice)
    {
        $order = File::where('id', $id)->with('order.details.article', 'client')->first();
        $num = $id * 12;
        $invoice = Invoice::firstOrNew(['file_id' => $id]);
        if(! isset($invoice['id'])) {
            $invoice['created_at'] = date("d-m-Y");
            $invoice['number'] = $num;
            $invoice->save();
        }
        if($req['_action'] == "sendmail") {
            $response = $invoice->sendMail($invoice, $order);
            return $response;
        }

//        return view('/pdf/order-invoice', ['order' => $order, 'invoice' => $invoice]);

        return view('/files/invoice-order', ['order' => $order, 'invoice' => $invoice]);
    }

    public function invoiceRepair($id , Request $req, Invoice $invoice)
    {
        $repair = File::where('id', $id)->with('repair.details.article','repair.device.modele.brand','repair.device.modele.category', 'client')->first();
        $num = $id * 12;
        $invoice = Invoice::firstOrNew(['file_id' => $id]);
        if(! isset($invoice['id'])) {
            $invoice['created_at'] = date("d-m-Y");
            $invoice['number'] = $num;
            $invoice->save();
        }

        if($req['_action'] == "sendmail") {
            $response = $invoice->sendRepairMail($invoice, $repair);
            return $response;

        }



        return view('/files/invoice-repair', ['repair' => $repair, 'invoice' => $invoice]);
    }

    public function searchFile(Request $req)
    {
        $action = $req->input('_action');
        if($action == "massiveSearch")
        {
            $id =  strtoupper($req['top_search']) ;
            if(strpos($id, 'R') !== false) {
               $idfi =  explode("R", $id)[0];
               $idcli =  explode("R", $id)[1];
                try {
                    $user = File::where(['id'=> $idfi, 'client_id'=> $idcli, 'type' => 'REPAIR'])->firstOrFail();
                    return  redirect("/file/repair/".$idfi);
                } catch (ErrorException $e) {
                    return redirect("/dashboard");
                }
            }
            else if(strpos($id, 'O') !== false) {
                $idfi =  explode("O", $id)[0];
                $idcli =  explode("O", $id)[1];
                try {
                    $user = File::where(['id'=> $idfi, 'client_id'=> $idcli , 'type' => 'ORDER'])->firstOrFail();
                    return  redirect("/file/order/".$idfi);
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

            $response = Order::calculateInvoice($req);

            if(isset($req['shifting_amount'])) {
                $params["shifting_amount"] = $req['shifting_amount'];
                $params["shifting_vat"] = $req['shifting_vat'];
            }
            if(isset($req['labor_amount'])) {
                $params["labor_amount"] = $req['labor_amount'];
                $params["labor_vat"] = $req['labor_vat'];
            }
            if(isset($req['part_amount'])) {
                $params["part_amount"] = $req['part_amount'];
                $params["part_vat"] = $req['part_vat'];
            }

            if(isset($req['advance_amount'])) {
                $params["advance_amount"] = $req['advance_amount'];

                $response['remaining'] =  $response['total'] - $req['advance_amount'] ;

            }

            $file = File::find($id)->update($params);


            $response = (isset($response)) ? ['status' => 'success', 'invoice' => $response] : ['status' => 'error'] ;
            return response($response);
        }
        else if($action == 'setStatusOrder') {

            $param['code_status_id'] = $req['code_status_id'];
            $param['file_id'] = $req['file_id'];
            $param['created_at'] = date('d/m/Y, H:i:s');
            $param['user_id'] = $req['user_id'];
            $param['comment'] = $req['comment'];

            $response = StatusFile::create($param)->id;
            File::find($param['file_id'])->touch();
            $param['user'] = Auth::user()->name;

            $response = ($response != '') ? ['status' => 'success', 'new' => $param] : ['status' => 'error'] ;
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
            $sum = $order->total_details_amount - $totaled;

            $order = Order::where(["file_id" => $id])->update(['total_details_amount' => $sum]);

            $stamp = date('d/m/Y, H:i:s');

            $res = ["status" => "success", "stamp" => $stamp, 'sum' => $sum];
        }
        else $res = ["status" => "error"];

        return $res;
    }


    public function deleteRepair($id, Request $req)
    {

        $todelete = RepairDetails::find($req['repair_detail_id']);
        $totaled = $todelete->price * $todelete->quantity;
        $deleted = $todelete->delete();


        if($deleted) {

            //UPDATE TOTAL
            $repair = Repair::where("file_id" , $id)->first();
            $sum = $repair->total_details_amount - $totaled;

            $repair = Repair::where(["file_id" => $id])->update(['total_details_amount' => $sum]);

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

    public function updateRepair($id, Request $req)
    {

        if(isset($req['article_id'])) {
            $total = 0;

            //UPDATE DETAIL & CALCULATE TOTAL
            foreach($req['article_id'] as $key => $article) {

                $detail = RepairDetails::firstOrCreate(['file_id' => $id, 'article_id' => $article]);
                $detail->price = $req["price"][$key];
                $detail->quantity = $req["quantity"][$key];

                $detail->save();
                $total += $req["price"][$key] * $req["quantity"][$key];
                $response["art-".$article] = $detail->id;
            }
            //UPDATE TOTAL
            $repair = Repair::where(["file_id" => $id]);

            $repair->update(['total_details_amount' => $total]);
            File::find($id)->touch();
        }
        $stamp = date('d/m/Y, H:i:s');
        return ["status" => "success", "new" => $response, "stamp" =>$stamp, 'sum' => $total];
    }

    public function editOrder($id)
    {
        $files = File::with('client', 'technicien', 'status.code.group', 'status.technicien')->get()->find($id);

        if( empty($files))
        {
            return redirect('/404');
        }
        $order = Order::where('file_id', $files['id'])->with('details')->first();
        $details = OrderDetails::where('file_id', $files['id'])->with('article.supplier')->get();
        $order['order_details'] = $details;
        $status = CodeStatus::with('group')->get();
        $status = CodeStatus::filterStatus($status, $files['status']);
        $files['last_status'] = CodeStatus::getLastStatus($files['status']);
        $supp = Supplier::all();
        $articles = Article::all();
//        $order["modele"] =  Modeles::where('id', $order['device']['model_id'])->with('category', 'brand')->get();
        $leftmenu['files'] = 'active';
        return view('/files/edit-order', [ 'leftmenu' => $leftmenu, 'files' => $files, 'orders' => $order, 'code_status' => $status, 'suppliers'   => $supp, 'articles'   => $articles,]);
    }

    public function editRepair($id)
    {
        $files = File::with('client', 'technicien', 'status.code.group', 'status.technicien')->get()->find($id);
        if( empty($files))
        {
            return redirect('/404');
        }
        //$files = File::with('client', 'technicien')->get();
        $repairs = Repair::where('file_id', $files['id'])->with('device.history.file.laststatus', 'details')->first();
        $details = RepairDetails::where('file_id', $files['id'])->with('article.supplier')->get();
        $repairs['repair_details'] = $details;
        $repairs["modele"] =  Modeles::where('id', $repairs['device']['model_id'])->with('category', 'brand', 'articles')->first();
        $repairs = CodeStatus::getOUT($repairs);
        $status = CodeStatus::with('group')->get();
        $status = CodeStatus::filterStatus($status, $files['status']);
        $files['last_status'] = CodeStatus::getLastStatus($files['status']);
        $supp = Supplier::all();
        $articles = Article::all();

        $leftmenu['files'] = 'active';
        return view('/files/edit-repair', [ 'leftmenu' => $leftmenu, 'files' => $files, 'repairs' => $repairs, 'code_status' => $status, 'suppliers'   => $supp, 'articles'   => $articles ]);
    }


    public function index()
    {
        $files = File::with('client', 'technicien', 'laststatus.code')->get();
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


                $param['code_status_id'] = '4';
                $param['file_id'] = $id;
                $param['created_at'] = date('d/m/Y, H:i:s');
                $param['user_id'] = Auth::user()->id;
                $param['comment'] = '';
                $response = StatusFile::create($param);

                File::find($id)->touch();

                if(isset($request['devis'])) {
                    $param['code_status_id'] = "15";
                    $response = StatusFile::create($param);
                    File::find($id)->touch();

                }


                return response(['status' => 'success', 'redirect' => '/file/repair/'.$id]);
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

                $param['code_status_id'] = '4';
                $param['file_id'] = $id;
                $param['created_at'] = date('d/m/Y, H:i:s');
                $param['user_id'] = Auth::user()->id;
                $param['comment'] = '';

                $response = StatusFile::create($param);
                File::find($id)->touch();


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
