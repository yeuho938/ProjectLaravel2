<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
         $table->id();
         $table->unsignedBigInteger('user_id');
         $table->string('name');
         $table->string('phone');
         $table->string('email');
         $table->string('address');
         $table->string('code');
         $table->float('percent');
         $table->bigInteger('total');
         $table->string('note');
         $table->string('detail');
         $table->string('status');
         $table->timestamps();
         $table->foreign('user_id')->references('id')->on('users');
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
