<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusResult extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_role', function (Blueprint $table) {
            //
            $table->string('status',20)->default('requested');
            $table->string('response_take1')->nullable();
            $table->string('response_self')->nullable();
            $table->string('response_audition')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('request_role', function (Blueprint $table) {
            //
        });
    }
}
