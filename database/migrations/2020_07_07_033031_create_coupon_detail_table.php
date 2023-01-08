<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('coupon_id')->unsigned()->nullable();
            $table->integer('product_id')->unsigned()->nullable();
            $table->double('price')->nullable();
            $table->integer('quantities')->unsigned()->nullable();
            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('CASCADE');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('CASCADE');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupon_detail', function (Blueprint $table) {
            $table->dropForeign(['coupon_id']);
            $table->dropForeign(['product_id']);
        });
        Schema::dropIfExists('coupon_detail');
    }
}
