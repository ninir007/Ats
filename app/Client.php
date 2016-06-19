<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = ['firstname',
        'lastname',
        'street',
        'postal_code',
        'city',
        'email',
        'mobile',
        'office',
        'fax',
        'vat'];
    public function files()
    {
        return $this->hasMany('App\File', 'client_id');
    }

    public function setFirstnameAttribute($value)
    {
        $this->attributes['firstname'] = strtolower($value);
    }
    public function setLastnameAttribute($value)
    {
        $this->attributes['lastname'] = strtolower($value);
    }
    public function setStreetAttribute($value)
    {
        $this->attributes['street'] = strtolower($value);
    }
    public function setCityAttribute($value)
    {
        $this->attributes['city'] = strtolower($value);
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
    public function setVatAttribute($value)
    {
        $this->attributes['vat'] = strtoupper($value);
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

}
