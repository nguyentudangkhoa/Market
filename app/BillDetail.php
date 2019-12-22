<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    //
    protected $table = "bill_detail";
    public function product(){
        return $this -> belongsTo('App\Product','id_bill','id');// khai báo khóa ngoại cho model ('đường dẫn model tên bảng cần trỏ','khóa ngoại kết nối 2 bảng','khóa chính của bảng model hiện hành')
        //belongTo() là phương thức tượng trưng cho lại liên kết 1 nhiều trong cơ sở dữ liệu
    }
    public function bill(){
        return $this -> belongsTo('App\Bill','id_bill','id');// khai báo khóa ngoại cho model ('đường dẫn model tên bảng cần trỏ','khóa ngoại kết nối 2 bảng','khóa chính của bảng model hiện hành')
        //belongTo() là phương thức tượng trưng cho lại liên kết 1 nhiều trong cơ sở dữ liệu
    }
}
