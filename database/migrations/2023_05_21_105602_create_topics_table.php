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
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lecturer_id');
            $table->integer('cryptography')->nullable();
            $table->integer('dss')->nullable();
            $table->integer('game_dev')->nullable();
            $table->integer('ai')->nullable();
            $table->integer('expert_system')->nullable();
            $table->integer('nlp')->nullable();
            $table->integer('image_processing')->nullable();
            $table->integer('iot')->nullable();
            $table->integer('cyber_security')->nullable();
            $table->integer('cloud_computing')->nullable();
            $table->timestamps();

            $table->foreign('lecturer_id')
                ->references('id')
                ->on('lecturers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topics');
    }
};
