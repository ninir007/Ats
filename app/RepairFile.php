<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepairFile extends Model
{
    protected $table ='repair_files';

    protected $fillable =['device_id',
        'client_id',
        'user_id',
        'intern_report',
        'client_report',
        'accessory',
        'labor_amount',
        'part_amount',
        'sum_amount'];


}
