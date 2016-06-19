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
        $total = 0;
        $total = $req['part_amount'] * ( 1 + ($req['part_vat']/100) ) ;

        return round($total, 2);
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
