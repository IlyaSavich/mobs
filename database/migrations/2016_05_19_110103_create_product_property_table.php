<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_property', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('category_property_id');
            $table->string('value');
            $table->timestamps();

            $table->foreign('product_id')->references('id')
                ->on('product')->onDelete('cascade');
            $table->foreign('category_property_id')->references('id')
                ->on('category_property')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_property');
    }
}
