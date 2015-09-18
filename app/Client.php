<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = ['firstname',
        'lastname',
        'address',
        'email',
        'mobile',
        'office',
        'fax',
        'tva'];


    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

}
