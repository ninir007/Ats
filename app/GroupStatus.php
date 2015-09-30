<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupStatus extends Model
{
    protected $table ='groups_status';

    protected $fillable =['label'];

    public $timestamps = false;

    public function codes()
    {
        return $this->hasMany('App\CodeStatus', 'group_status_id');
    }

    public function getLabelAttribute($value)
    {
        return mb_strtoupper($value);
    }
    public function setLabelAttribute($value)
    {
        $this->attributes['label'] = mb_strtolower($value);
    }
}
