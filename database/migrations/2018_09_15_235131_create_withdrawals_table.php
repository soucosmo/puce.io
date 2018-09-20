<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWithdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('id_api', 40)->nullable()->default(null);
            $table->integer('coin');
            $table->string('address', 250);
            $table->string('payment_id', 250)->nullable()->default(null);
            $table->string('tx_id', 250)->nullable()->default(null);
            $table->string('amount', 60);
            $table->string('fee', 12)->default('0.00000000');
            $table->string('fee_api', 12)->default('0.00000000');
            $table->string('url', 100)->nullable()->default(null);
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
        Schema::dropIfExists('withdrawals');
    }
}
