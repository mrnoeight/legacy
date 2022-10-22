<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registration_id');
            $table->string('firstName', 100)->nullable();
            $table->string('lastName', 100)->nullable();
            $table->string('trxId', 100)->nullable();
            $table->string('merId', 100)->nullable();
            $table->string('merTrxId', 100)->nullable();
            $table->string('invoiceNo', 100)->nullable();
            $table->string('goodsNm', 200)->nullable();
            $table->string('payToken', 200)->nullable();
            $table->string('merchantToken', 200)->nullable();
            $table->string('timeStamp', 50)->nullable();
            $table->string('bankId', 100)->nullable();
            $table->string('bankName', 100)->nullable();
            $table->string('cardNo', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
