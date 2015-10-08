<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table ='files';
    protected $morphClass ='MorphFile';


    protected $fillable = [
        'user_id',
        'client_id',
        'represent_type',
        'represent_id',
        'intern_report',
        'client_report',
        'labor_amount',
        'part_amount',
        'sum_amount' ];

    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id');
    }

    public function technicien()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function represent()
    {
        return $this->morphTo();
    }
}

class Repair extends Model
{
    protected $table ='repairs';

    protected $fillable = [
        'device_id',
        'accessory'
    ];


    public function files()
    {
        return $this->morphMany('App\File', 'represent');
    }




}

