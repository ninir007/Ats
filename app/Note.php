<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;

class Note extends Model
{
    protected $table ='notes';
    protected $fillable =['title','content','scope', 'user_id'];



    public function technicien()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = mb_strtolower($value);
    }

    public function getContentAttribute($value)
    {
        return mb_strtolower($value);
    }

    public function getCreatedAtAttribute($value)
    {
        $dated = date('d/m/Y, H:i:s', strtotime($value));
        return $dated;
    }
    public static function countMyMsg($notes)
    {
        $count = 0;
        foreach($notes as $note) {
            if($note['scope'] == 'PRIVATE' && $note['user_id'] ==  Auth::user()['id']) {
                $count++;
            }
            else if($note['scope'] == 'PUBLIC') {
                $count++;

            }
            else {

            }
        }

        Session::put('countnote', $count);

        return $count;
    }
}
