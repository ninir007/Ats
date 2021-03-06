<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table ='orders_details';

    protected $fillable = [
        'file_id',
        'article_id',
        'price',
        'quantity'
    ];

    public function order()
    {
        return $this->belongsTo('App\Order', 'file_id', 'file_id');
    }

    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
