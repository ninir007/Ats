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
    public function articles()
    {
        return $this->belongsToMany('App\Article', 'modele_article','model_id' , 'article_id' );
    }
    public function repairs()
    {
        return $this->hasManyThrough('App\Repair', 'App\Device', 'model_id', 'device_id');
    }
    public function devices()
    {
        return $this->hasMany('App\Device', 'model_id');
    }
}
