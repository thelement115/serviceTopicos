<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class buyOrder extends Model
{
    protected $fillable=[
        'paymentForm','user_id','date'
    ];

    public function getId(){
        return $this->attributes['id'];
    }

    public function setId($id){
        $this->attributes['id'] = $id;
    }

    public function getDate(){
        return $this->attributes['date'];
    }

    public function setDate(){
        $this->attributes['date'] =Carbon::now();
    }

    public function getPaymentForm(){
        return $this->attributes['paymentForm'];
    }

    public function setPaymentForm($paymentForm){
        $this->attributes['paymentForm'] = $paymentForm;
    }
}
