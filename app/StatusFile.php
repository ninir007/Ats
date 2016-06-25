<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusFile extends Model
{
    protected $table ='status_files';
    public $timestamps = false;


    protected $fillable = [
        'file_id',
        'user_id',
        'code_status_id',
        'comment',
        'created_at',
    ];


    public function file()
    {
        return $this->belongsTo('App\File', 'file_id');
    }

    public function technicien()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function code()
    {
        return $this->belongsTo('App\CodeStatus', 'code_status_id');
    }






    public function getCreatedAtAttribute($value)
    {
        $dated = date('d/m/Y, H:i:s', strtotime($value));
        return $dated;
    }

    public function setCreatedAtAttribute($value)
    {
        $dated = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $value)));
        $this->attributes['created_at'] = $dated;
    }


}

