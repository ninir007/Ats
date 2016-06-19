<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table ='invoices';
    public $timestamps = false;

    protected $fillable = [
        'file_id',
        'number',
        'created_at'
    ];


    public function setCreatedAtAttribute($value)
    {
        $dated = date('Y-m-d', strtotime(str_replace('/', '-', $value)));
        $this->attributes['created_at'] = $dated;
    }
    public function getCreatedAtAttribute($value)
    {
        $dated = date('d/m/Y', strtotime($value));
        return $dated;
    }

    public function setNumberAttribute($value)
    {
        $this->attributes['number'] = strtoupper('INV-'.$value);
    }

}
