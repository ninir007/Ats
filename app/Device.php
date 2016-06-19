<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table ='devices';
    protected $fillable =['serial_number', 'purchased_at','model_id'];
    public $timestamps = false;

    public function setPurchasedAtAttribute($value)
    {
        $dated = date('Y-m-d', strtotime(str_replace('/', '-', $value)));
        $this->attributes['purchased_at'] = $dated;
    }


    public function getPurchasedAtAttribute($value)
    {
        $dated = date('d/m/Y', strtotime($value));
        return $dated;
    }

    public static function convertDate($value)
    {
        $dated = date('Y-m-d', strtotime(str_replace('/', '-', $value)));
        return $dated;
    }

    public function modele()
    {
        return $this->belongsTo('App\Modeles', 'model_id');
    }
    public function repairs()
    {
        return $this->hasMany('App\Repair', 'device_id');
    }

}
