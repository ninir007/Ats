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
        return $this->belongsTo('App\GroupStatus', 'group_status_id');
    }

    public function getLabelAttribute($value)
    {
        return mb_strtoupper($value);
    }
    public function getStepAttribute($value)
    {
        return mb_strtoupper($value);
    }

    public function getDescriptionAttribute($value)
    {
        return mb_strtoupper($value);
    }



    public function setLabelAttribute($value)
    {
        $this->attributes['label'] = mb_strtolower($value);
    }
    public function setStepAttribute($value)
    {
        $this->attributes['step'] = mb_strtolower($value);
    }

    public function setStep_stepAttribute($value)
    {
        $this->attributes['step_step'] = mb_strtolower($value);
    }
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = mb_strtolower($value);
    }

}
