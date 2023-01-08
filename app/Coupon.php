<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    public $table = "phieunhap";

    protected $fillable = [
        'id_NV'
    ];

    public function user(){
    	return $this->belongsTo('App\User','id_NV');
    }
    public function coupoun_detail(){
    	return $this->hasMany('App\Coupoun_Detail','id_PN');
    }

    public $timestamps = false;
}
