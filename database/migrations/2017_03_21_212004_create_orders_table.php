<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('useraddress');
            $table->string('userphone');
            $table->string('fullname');
            $table->string('useremail')->default('anything@gmail.com');
            $table->string('moreinfo',250)->nullable();
            $table->integer('payment_id')->unsigned()->index();
            $table->integer('status');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');;
            $table->integer('amount')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
