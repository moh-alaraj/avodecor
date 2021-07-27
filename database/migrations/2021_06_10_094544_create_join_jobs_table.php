<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('birth_date');
            $table->string('address');
            $table->enum('sex',['ذكر','أنثى']);
            $table->string('education');
            $table->string('job');
            $table->string('job_title');
            $table->enum('work',['كامل','جزئي','بالساعة']);
            $table->string('salary');
            $table->string('yexp');
            $table->string('dexp');
            $table->string('cv');
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
        Schema::dropIfExists('join_jobs');
    }
}
