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
        Schema::create('students_questions', function (Blueprint $table) {
            $table->id();
            $table->index('student_id');
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->string('question');
            $table->string('teacher_remark')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('students_questions');
    }
};
