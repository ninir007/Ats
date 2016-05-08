<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    protected $table ='repairs';

    protected $fillable = [
        'file_id',
        'device_id',
        'accessory'
    ];
    public function device()
    {
        return $this->belongsTo('App\Device', 'device_id');
    }

    public function file()
    {
        return $this->belongsTo('App\File', 'file_id', 'id');
    }







}
