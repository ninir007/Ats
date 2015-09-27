<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    protected $table =['models'];

    protected $fillable =['name'];


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
}
