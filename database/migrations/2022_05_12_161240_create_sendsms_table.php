<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendsmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sendsms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('sender')->nullable();
            $table->string('phone')->nullable();
            $table->string('description')->nullable();
            $table->tinyInteger('user_id')->nullable();
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
        Schema::dropIfExists('sendsms');
    }
}
