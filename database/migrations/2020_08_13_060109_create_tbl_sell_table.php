<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSellTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sell', function (Blueprint $table) {
           $table->increments('product_id');
            $table->string('product_name');
            $table->string('mobile_number');
            $table->longText('product_description');
            $table->float('product_price');
            $table->string('product_image'); 
            $table->string('product_size');
            $table->integer('publication_status');
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
        Schema::dropIfExists('tbl_sell');
    }
}
