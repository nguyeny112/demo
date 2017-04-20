<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturedSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('featured_sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_path');
            $table->string('title',50);
            $table->string('desc',150);
            $table->string('link');
            $table->string('buttontext')->default('More');
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
        Schema::dropIfExists('featured_sliders');
    }
}
