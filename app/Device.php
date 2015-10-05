<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table ='devices';
    protected $fillable =['serial_number','description', 'purchased_at','model_id'];
    public $timestamps = false;
   // protected $dateFormat = 'd-m-Y';


    public function setPurchasedAtAttribute($value)
    {
        $dated = date('Y-m-d', strtotime($value));
        $this->attributes['purchased_at'] = $dated;
    }
}
