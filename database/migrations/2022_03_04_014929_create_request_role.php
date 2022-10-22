<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_role', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prole_id');
            $table->foreign('prole_id')
                ->references('id')
                ->on('proles')
                ->onDelete('cascade');
            $table->unsignedBigInteger('registration_id');
            $table->foreign('registration_id')
                ->references('id')
                ->on('registrations')
                ->onDelete('cascade');
            $table->string('request_type', 50)->nullable();
            $table->integer('request_round')->default(0);
            $table->integer('request_like')->default(0);
            $table->date('request_date_take1')->nullable();
            $table->date('request_date_self')->nullable();
            $table->date('request_date_audtion')->nullable();
            $table->string('request_status_take1', 50)->nullable();
            $table->string('request_status_self', 50)->nullable();
            $table->string('request_status_audtion', 50)->nullable();
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
        Schema::dropIfExists('request_role');
    }
}
