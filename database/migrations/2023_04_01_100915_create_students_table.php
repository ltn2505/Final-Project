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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('school_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('school_id')->references('id')->on('schools');
            $table->string('student_name');
            $table->string('class')->nullable();
            $table->string('gender')->nullable();
            $table->string('mobile')->nullable();
            $table->string('orther_phone')->nullable();
            $table->string('parent_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('specialized_register')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->default('New');
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
        Schema::dropIfExists('students');
    }
};
