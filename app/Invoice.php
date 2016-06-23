<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;


class Invoice extends Model
{
    protected $table ='invoices';
    protected $num ='';
    public $timestamps = false;

    protected $fillable = [
        'file_id',
        'number',
        'created_at'
    ];


    public function setCreatedAtAttribute($value)
    {
        $dated = date('Y-m-d', strtotime(str_replace('/', '-', $value)));
        $this->attributes['created_at'] = $dated;
    }
    public function getCreatedAtAttribute($value)
    {
        $dated = date('d/m/Y', strtotime($value));
        return $dated;
    }

    public function setNumberAttribute($value)
    {
        $this->attributes['number'] = strtoupper('INV-'.$value);
    }

    public function sendMail($invoice, $order) {
        $this->num = $invoice->number;
        try {
            Mail::send('/pdf/order-invoice', ['order' => $order, 'invoice' => $invoice], function($message){
                $message->to('bouzanih.mounir@gmail.com', 'some Guy')->subject('Votre facture : '.$this->num);
            });
        }
        catch(Error $e) {
            abort('500');
        }
        return['status' => 'success'];
    }

}
