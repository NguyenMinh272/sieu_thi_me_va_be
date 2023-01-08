<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order_Detail extends Model
{
    public $table = "chitietdonhang";

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_SP', 'id' );
    }

    public $timestamps = false;
}
