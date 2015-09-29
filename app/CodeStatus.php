<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodeStatus extends Model
{
    protected $table ='codes_status';
    protected $fillable =['label','group_status_id', 'step', 'step_step', 'description'];

    public $timestamps = false;


    public function group()
    {
        return $this->belongsTo('App\GroupStatus');
    }
}
