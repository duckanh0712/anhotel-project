<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_book', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->integer('room_id');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('state');
            $table->bigInteger('user_id');
            $table->bigInteger('employee_id')->nullable();
            $table->bigInteger('cashier')->nullable();
            $table->integer('total_price')->nullable();
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
        Schema::dropIfExists('room_book');
    }
}
