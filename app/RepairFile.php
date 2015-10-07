<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepairFile extends Model
{
    protected $table ='repair_files';

    protected $fillable = [
        'device_id',
        'file_id',
        'accessory'
    ];


}
