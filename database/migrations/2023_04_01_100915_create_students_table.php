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
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('student_name')->nullable();
            $table->string('school_name')->nullable();
            $table->string('class')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('mobile')->nullable();
            $table->string('other_phone')->nullable();
            $table->string('parent_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('specialized_register')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->default('New');
            $table->string('image')->nullable();
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
