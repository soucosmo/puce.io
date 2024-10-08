<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id')->null();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->addColumn('tinyInteger', 'coin', ['length' => 2]);
            $table->string('address', 95);
            $table->string('payment_id', 95)->nullable()->default(null);
            $table->string('url', 80)->nullable();
            $table->string('module', 4);
            $table->char('api', 1)->nullable()->default(null);

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
        Schema::dropIfExists('addresses');
    }
}
