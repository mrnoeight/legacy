<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlockInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_info', function (Blueprint $table) {
            $table->id();
            $table->text('head_tag1')->nullable();
            $table->text('head_title1')->nullable();
            $table->text('head_desc1')->nullable();
            $table->text('info1')->nullable();
            $table->string('block_name', 255)->nullable();
            $table->string('block_type', 255)->nullable();
            
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
        Schema::dropIfExists('block_info');
    }
}
