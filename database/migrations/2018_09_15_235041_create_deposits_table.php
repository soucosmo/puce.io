<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('coin');
            $table->string('address', 250);
            $table->string('payment_id', 250)->nullable();
            $table->string('tx_id', 250)->nullable();
            $table->string('amount', 60);
            $table->string('fee', 12);
            $table->string('fee_api', 12)->default('0.00000000');
            $table->enum('status', ['pending', 'canceled', 'complete'])->default('pending');

            $table->string('module', 25);

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
        Schema::dropIfExists('deposits');
    }
}
