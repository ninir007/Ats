<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepairDetails extends Model
{
    protected $table ='repairs_details';

    protected $fillable = [
        'file_id',
        'article_id',
        'price',
        'quantity'
    ];

    public function repair()
    {
        return $this->belongsTo('App\Repair', 'file_id', 'file_id');
    }

    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
