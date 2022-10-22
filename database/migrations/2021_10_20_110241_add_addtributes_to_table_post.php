<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddtributesToTablePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            
            $table->string('other_location', 155)->nullable();
            $table->string('project_budget', 155)->nullable();
            $table->date('start_casting_date')->nullable();
            $table->date('end_casting_date')->nullable();
            $table->date('start_rehearsal_date')->nullable();
            $table->date('end_rehearsal_date')->nullable();
            $table->date('start_photo_date')->nullable();
            $table->date('end_photo_date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
}
