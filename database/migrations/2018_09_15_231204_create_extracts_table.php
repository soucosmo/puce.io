<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extracts', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('operation_id')->nullable()->default(null);
            $table->char('type', 1)->nullable()->default();
            $table->enum('action', ['transfer', 'deposit', 'withdrawal', 'debit', 'credit', 'commission', 'others']);
            $table->string('description', 66);
            $table->addColumn('tinyInteger', 'coin', ['length' => 2]);
            $table->string('before', 22);
            $table->string('amount', 22);
            $table->string('after', 22);
            
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
        Schema::dropIfExists('extracts');
    }
}
