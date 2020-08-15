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
            $table->id();
            $table->text('name');

            $table->unsignedBigInteger('category_id');

            $table->text('price');
            $table->text('old_price')->nullable();	
            $table->text('offer')->nullable();
            $table->text('brand');
            $table->text('image')->nullable();
            $table->text('rate')->nullable();	
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('catergories');

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
