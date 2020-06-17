<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    public $table =  'rating';
    public $fillable = ['id_product','id_users','id_bill','rate','status_rate'];
    public function product(){
        return $this->belongsTo('App\Product', 'id_product', 'id');
    }
    public function user(){
        return $this->belongsTo('App\User', 'id_users', 'id');
    }
    public function bill(){
        return $this->belongsTo('App\Bill', 'id_bill', 'id');
    }
}
