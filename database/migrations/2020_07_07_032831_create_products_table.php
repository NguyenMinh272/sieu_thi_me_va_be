<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id')->unsigned()->nullable();
            $table->integer('category_product_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->double('price')->nullable();
            $table->longText('description')->nullable();
            $table->integer('quantities')->unsigned()->nullable();
            $table->string('size')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->unsigned()->default(0);
            $table->timestamps();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('CASCADE');
            $table->foreign('category_product_id')->references('id')->on('category_products')->onDelete('CASCADE');
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
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['supplier_id']);
            $table->dropForeign(['category_product_id']);
        });
        Schema::dropIfExists('products');
    }
}
