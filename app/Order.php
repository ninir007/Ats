<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='orders';

    protected $fillable = [
        'file_id',
        'total'
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







}
