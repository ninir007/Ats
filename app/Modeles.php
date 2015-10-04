<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modeles extends Model
{
    protected $table ='models';

    protected $fillable =['name','category_id','brand_id'];
    public $timestamps = false;


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
