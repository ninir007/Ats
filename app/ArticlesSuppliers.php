<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticlesSuppliers extends Model
{
    protected $table ='articles_suppliers';
    protected $fillable =['article_id','supplier_id','standard_price'];


    public function article()
    {
        return $this->belongsTo('App\Article');
    }

    public function getCreatedAtAttribute($value)
    {
        $dated = date('d/m/Y, H:i:s', strtotime($value));
        return $dated;
    }
    public function getUpdatedAtAttribute($value)
    {
        $dated = date('d/m/Y, H:i:s', strtotime($value));
        return $dated;
    }


    public function setCreatedAtAttribute($value)
    {
        $dated = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $value)));
        $this->attributes['created_at'] = $dated;
    }
    public function setUpdatedAtAttribute($value)
    {
        $dated = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $value)));
        $this->attributes['updated_at'] = $dated;
    }

}

