<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->index('user_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('description');
            $table->integer('creator');
            $table->timestamp('created_at');
        });

        DB::statement('create view student_last_statuses as 
        (
        with last_statuses as (
            select user_id, max(created_at) as created_at
            from statuses 
            group by user_id)
            select ls.user_id,  description, ls.created_at
                     from last_statuses ls 
                     join statuses s on ls.user_id = s.user_id and 
                        ls.created_at = s.created_at 
          )
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
};
