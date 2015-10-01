<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table ='articles';
    protected $fillable =['reference','description', 'model_id'];

    public $timestamps = false;



    public function model()
    {
        return $this->belongsTo('App\Models', 'id');
    }

    public function setReferenceAttribute($value)
    {
        $this->attributes['reference'] = mb_strtolower($value);
    }
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = mb_strtolower($value);
    }

    public function getDescriptionAttribute($value)
    {
        return mb_strtoupper($value);
    }
    public function getReferenceAttribute($value)
    {
        return mb_strtoupper($value);
    }


}
