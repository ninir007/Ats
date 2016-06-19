<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';

    protected $fillable = ['name',
        'contact',
        'street',
        'postal_code',
        'city',
        'country',
        'email',
        'office',
        'fax',
        'mobile'];


    public function articles()
    {
        return $this->hasMany('App\Article', 'supplier_id');
    }


    /*GETTER*/
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


    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    /*SETTER*/
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    public function setContactAttribute($value)
    {
        $this->attributes['contact'] = strtolower($value);
    }

    public function setStreetAttribute($value)
    {
        $this->attributes['street'] = strtolower($value);
    }

    public function setPostalCodeAttribute($value)
    {
        $this->attributes['postal_code'] = strtolower($value);
    }

    public function setCityAttribute($value)
    {
        $this->attributes['city'] = strtolower($value);
    }

    public function setCountryAttribute($value)
    {
        $this->attributes['country'] = strtolower($value);
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    public function setOfficeAttribute($value)
    {
        $this->attributes['office'] = strtolower($value);
    }

    public function setFaxAttribute($value)
    {
        $this->attributes['fax'] = strtolower($value);
    }

    public function setMobileAttribute($value)
    {
        $this->attributes['mobile'] = strtolower($value);
    }



}
