<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    protected $table ='repairs';
    public $timestamps = false;

    protected $fillable = [
        'file_id',
        'device_id',
        'description',
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

    public function details()
    {
        return $this->hasMany('App\RepairDetails', 'file_id', 'file_id');
    }
}
