<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon_Detail extends Model
{
    public $table = "chitietphieunhap";

    public function product(){
    	return $this->belongsTo('App\Products','id_SP');
    }

    public $timestamps = false;
}
