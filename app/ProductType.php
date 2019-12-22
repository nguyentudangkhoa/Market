<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    //
    protected $table = "type_products";
    public function product(){
        return $this->hasMany('App\Product', 'id_type', 'id'); // khai báo khóa ngoại cho model ('đường dẫn model tên bảng cần trỏ','khóa ngoại kết nối 2 bảng','khóa chính của bảng model hiện hành')
        //has many là lại liên kết 1 nhiều trong cơ sở dữ liệu
    }
}
