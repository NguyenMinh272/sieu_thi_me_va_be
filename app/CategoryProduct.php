<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryProduct extends Model
{
    public $table = "danhmucsanpham";
    public $timestamps = false;

    public function products(){
    	return $this->hasMany('App\Product','category_product_id');
    }

    public function category_product_parent(){
    	return $this->belongsTo(CategoryProduct::class, 'id_DMSPCha');
    }
}
