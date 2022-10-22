<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttToTableProle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proles', function (Blueprint $table) {
            //
            $table->string('budget', 155)->nullable();
            $table->date('expired_date')->nullable();
            $table->date('start_casting_date')->nullable();
            $table->date('end_casting_date')->nullable();
            $table->date('start_rehearsal_date')->nullable();
            $table->date('end_rehearsal_date')->nullable();
            $table->date('start_photo_date')->nullable();
            $table->date('end_photo_date')->nullable();
            $table->string('contact_name', 150)->nullable();
            $table->string('contact_email', 150)->nullable();
            $table->string('contact_phone', 150)->nullable();
            $table->string('contact_time', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prole', function (Blueprint $table) {
            //
        });
    }
}
