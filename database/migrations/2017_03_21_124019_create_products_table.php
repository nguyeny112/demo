<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('pname');
            $table->string('preview')->nullable();
            $table->text('detail')->nullable();
            $table->text('spec')->nullable();
            $table->string('image');
            $table->tinyInteger('rating')->default(0);
            $table->integer('view')->default(0);
            $table->integer('price');
            $table->integer('available')->default(1);
            $table->integer('qty')->default(100);
            $table->integer('cat_id')->unsigned()->index();
            $table->integer('brand_id')->unsigned()->index();
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->integer('discount')->nullable();
            $table->string('tags',250)->nullable();
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
