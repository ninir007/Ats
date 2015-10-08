<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    protected $table ='repairs';
    protected $morphClass ='MorphRepair';

    protected $fillable = [
        'device_id',
        'accessory'
    ];


    public function files()
    {
        return $this->morphMany('App\File', 'represent');
    }




}
