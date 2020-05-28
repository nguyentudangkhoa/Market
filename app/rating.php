<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    public $table =  'rating';
    public $fillable = ['id_product','rate'];
    public function product(){
        return $this->belongsTo('App\Product', 'id_product', 'id');
    }
}
