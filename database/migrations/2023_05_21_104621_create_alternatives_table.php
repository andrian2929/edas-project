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
        Schema::create('alternatives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lecturer_id');
            # Lecturer chat response time
            $table->string('criteria_1');

            # Lecturer time availability
            $table->string('criteria_3');

            # Lecturer care
            $table->string('criteria_4');
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
        Schema::dropIfExists('alternatives');
    }
};
