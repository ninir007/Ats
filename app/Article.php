<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table ='articles';
    protected $fillable =['reference','description'];

    public $timestamps = false;



    public function theModels()
    {
        return $this->belongsToMany('App\Modeles', 'modele_article', 'article_id', 'model_id');
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
