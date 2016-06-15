<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCascadeDeleteToForeignInProductCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_category', function (Blueprint $table) {
            $table->dropForeign('product_category_product_id_foreign');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            
            $table->dropForeign('product_category_category_id_foreign');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_category', function (Blueprint $table) {
            $table->dropForeign('product_category_product_id_foreign');
            $table->foreign('product_id')->references('id')->on('product');

            $table->dropForeign('product_category_category_id_foreign');
            $table->foreign('category_id')->references('id')->on('category');
        });
    }
}
