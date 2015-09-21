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


    public function setFirstnameAttribute($value)
    {
        $this->attributes['firstname'] = strtolower($value);
    }
    public function setLastnameAttribute($value)
    {
        $this->attributes['lastname'] = strtolower($value);
    }
    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = strtolower($value);
    }
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
    public function setMobileAttribute($value)
    {
        $this->attributes['mobile'] = strtolower($value);
    }
    public function setOfficeAttribute($value)
    {
        $this->attributes['office'] = strtolower($value);
    }
    public function setFaxAttribute($value)
    {
        $this->attributes['fax'] = strtolower($value);
    }
    public function setTvaAttribute($value)
    {
        $this->attributes['tva'] = strtolower($value);
    }


}
