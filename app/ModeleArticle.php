<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModeleArticle extends Model
{
    protected $table ='modele_article';

    protected $fillable =['name','model_id','article_id'];
    public $timestamps = false;



}
