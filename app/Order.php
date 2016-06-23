<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='orders';
    public $timestamps = false;

    protected $fillable = [
        'file_id',
        'total_details_amount'
    ];

    public function file()
    {
        return $this->belongsTo('App\File', 'file_id', 'id');
    }

    public function details()
    {
        return $this->hasMany('App\OrderDetails', 'file_id', 'file_id');
    }

    public static function calculateTotal($list)
    {
        $total = 0;
        foreach($list as $detail)
        {
            $total += $detail['price'] * $detail['quantity'];
        }

        return $total;
    }
    public static function calculateInvoice($req)
    {
        $total['total'] = 0;

        if(isset($req['part_amount'])) {
            $total['part'] = $req['part_amount'] * ( 1 + ($req['part_vat']/100) ) ;
            $total['total'] += $total['part'];
        }
        if(isset($req['shifting_amount'])) {
            $total['shifting'] = $req['shifting_amount'] * ( 1 + ($req['shifting_vat']/100) ) ;
            $total['total'] += $total['shifting'];
        }
        if(isset($req['labor_amount'])) {
            $total['labor'] = $req['labor_amount'] * ( 1 + ($req['labor_vat']/100) ) ;
            $total['total'] += $total['labor'];
        }
        $total['total'] = round( $total['total'], 2);
        return $total;
    }

    /*GETTER*/
    public function getCreatedAtAttribute($value)
    {
        $dated = date('d/m/Y, H:i:s', strtotime($value));
        return $dated;
    }
    public function getUpdatedAtAttribute($value)
    {
        $dated = date('d/m/Y, H:i:s', strtotime($value));
        return $dated;
    }





}
