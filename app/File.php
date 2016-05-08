<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table ='files';


    protected $fillable = [
        'user_id',
        'client_id',
        'intern_report',
        'client_report',
        'labor_amount',
        'part_amount',
        'sum_amount' ];

    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id');
    }

    public function technicien()
    {
        return $this->belongsTo('App\User', 'user_id');
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

