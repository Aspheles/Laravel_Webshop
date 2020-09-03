<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('Product_ID');
            $table->timestamps();
            $table->string('ProductName');
            // $table->unsignedBigInteger('Category_ID');
            // $table->foreign("Category_ID")
            //         ->references('Category_ID')
            //         ->on('order_category');
            $table->string('Description');
            $table->double('Price');
            $table->string('Image');
            $table->string('Brand');
            
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
