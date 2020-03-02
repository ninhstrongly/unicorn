<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopeeProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopee_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_prd');
            $table->bigInteger('id_industry');
            $table->string('name');
            $table->text('description');
            $table->string('price');
            $table->integer('sell_qtt');
            $table->integer('stock_qtt');
            $table->text('variant');
            $table->text('image');
            $table->integer('id_shop')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopee_product');
    }
}
