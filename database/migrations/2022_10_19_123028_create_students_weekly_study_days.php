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
        Schema::create('students_weekly_study_days', function (Blueprint $table) {
            $table->id();
            $table->index('user_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            //->references('id')->on('users');
            $table->integer('day_of_week');
            $table->time('start_time')->nullable(); // todo check
            $table->time('end_time')->nullable(); // todo check
            $table->boolean('is_remote')->nullable();
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
        Schema::dropIfExists('students_weekly_study_days');
    }
};
