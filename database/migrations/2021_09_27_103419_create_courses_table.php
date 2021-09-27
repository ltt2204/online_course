<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->uuid('id')->primary(); // ID of the course
            $table->string('name'); // Name of the course
            $table->string('key'); // The enrolment key
            $table->text('content')->nullable(); // The introduction of the course
            $table->string('file')->nullable(); // The course content in file PDF, DOCX, ..
            $table->string('avatar')->nullable(); // The course image
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->unsignedInteger('num_stud')->default(0);
            $table->string('status')->default('on');
            $table->timestamps();
            $table->foreignUuid('user_id')->references('id')->on('users');
            $table->foreignUuid('subject_id')->references('id')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
