<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    protected $table = 'brands';

    protected $fillable =['name'];
    public $timestamps = false;

    public function models()
    {
        return $this->hasMany('App\Model');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
}
