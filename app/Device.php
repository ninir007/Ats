<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table ='devices';
    protected $fillable =['serial_number','description', 'purchased_at','model_id'];
    public $timestamps = false;
}
