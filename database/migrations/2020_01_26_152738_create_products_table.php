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
            $table->bigIncrements('id');
            $table->string('product_name')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('product_photo')->nullable();
            $table->string('product_new')->nullable();
            $table->string('product_promo')->nullable();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->double('product_price')->nullable();
            $table->double('original_price')->nullable();
            $table->unsignedInteger('units')->default(0);
            $table->longText('product_description')->nullable();
            $table->string('type_name')->nullable();
            $table->string('brand_name')->nullable();
            $table->boolean('in_stock')->default(false)->nullable();
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
        Schema::dropIfExists('products');
    }
}
