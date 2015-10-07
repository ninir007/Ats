<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table ='files';

    protected $fillable = [
        'user_id',
        'client_id',
        'type',
        'intern_report',
        'client_report',
        'labor_amount',
        'part_amount',
        'sum_amount' ];

}
