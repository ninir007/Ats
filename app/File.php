<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table ='files';


    protected $fillable = [
        'user_id',
        'client_id',
        'type',
        'intern_report',
        'client_report',
        'labor_amount',
        'part_amount',
        'advance_amount',
        'shifting_amount',
        'labor_vat',
        'part_vat',
        'shifting_vat',
        'sum_amount'
    ];

    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id');
    }

    public function technicien()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function repair()
    {
        return $this->hasOne('App\Repair', 'file_id');
    }
    public function order()
    {
        return $this->hasOne('App\Order', 'file_id');
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



    public static function dumpFile()
    {
        $result['reparation'] = '';
        $result['commande'] = '';
        $response = File::with('client', 'technicien')->get();


        foreach($response as $file)
        {

            $result['reparation'][]= [
                'id' => $file->id,
                'intern_report' => $file->intern_report,
                'client' => $file->intern_report,
            ];

        }
         return $result;
    }



}

