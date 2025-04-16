<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('session_id');
            $table->string('subject');
            $table->string('title');
            $table->string('message');
            $table->string('text');
            $table->string('support');
            $table->integer('number_of_time');
            $table->integer('send_after_days');
            $table->boolean('on_minimum_order_amount')->default(false);
            $table->bigInteger('min_order_amount')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
