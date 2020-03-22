<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_type')->nullable();
            $table->unsignedInteger('product_id');
            $table->longText('p_description')->nullable();
            $table->longText('product_detail')->nullable();
            $table->string('product_color')->nullable();
            $table->string('product_country')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_caracteristic')->nullable();
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
        Schema::dropIfExists('detail_products');
    }
}
