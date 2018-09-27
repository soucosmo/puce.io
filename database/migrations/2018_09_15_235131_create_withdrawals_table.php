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
            $table->addColumn('tinyInteger', 'coin', ['length' => 2]);
            $table->string('address', 95);
            $table->string('payment_id', 95)->nullable()->default(null);
            $table->string('tx_id', 64)->nullable()->default(null);
            $table->string('amount', 22);
            $table->string('fee', 12)->default('0.00000000');
            $table->string('fee_api', 12)->default('0.00000000');
            $table->string('url', 80)->nullable()->default(null);
            $table->addColumn('tinyInteger', 'returns', ['length' => 2])->default(0);
            $table->enum('status', ['pending', 'canceled', 'complete'])->default('pending');
            $table->string('module', 4);

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
