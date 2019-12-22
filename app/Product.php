<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = "products";
    public function product_type(){
        return $this->belongsTo('App\ProductType', 'id_type', 'id'); // khai báo khóa ngoại cho model ('đường dẫn model tên bảng cần trỏ','khóa ngoại kết nối 2 bảng','khóa chính của bảng csdl hiện hành')
        //belongsTo là lại liên kết 1:1 trong cơ sở dữ liệu vì 1 sản phẩm chỉ thuộc 1 loại sản phẩm
    }
    public function bill_detail(){
        return $this->hasMany('App\BillDetail', 'id_product', 'id');
    }
}
