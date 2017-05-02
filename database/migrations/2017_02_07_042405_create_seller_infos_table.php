<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('seller_name');
            $table->string('seller_email')->nullable();
            $table->text('seller_phone')->nullable();
            $table->text('seller_mobile')->nullable();
            $table->text('product_name')->nullable();
            $table->text('product_image')->nullable();
            $table->text('location')->nullable();
            $table->string('product_prize')->nullable();
            $table->string('negotiable')->nullable();
            $table->string('condition')->nullable();
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
        Schema::dropIfExists('seller_infos');
    }
}
