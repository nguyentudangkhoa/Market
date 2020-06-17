<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $table = "bills";
    public function bill_detail(){
        return $this->hasMany('App\BillDetail', 'id_bill', 'id');
    }
    public function customer(){
        return $this->belongsTo('App\Customer', 'id_customer', 'id');
    }
    public function rating(){
        return $this->belongsTo('App\rating', 'id_bill', 'id');
    }
}
