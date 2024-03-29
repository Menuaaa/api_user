<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_times', function (Blueprint $table) {
            $table->id();
            $table->string('data');
            $table->time('time');
            $table->string('location');
            $table->string('user_name');
            $table->foreignId('service_id');
            $table->json('service')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_times');
    }
};
