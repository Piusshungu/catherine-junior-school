<?php

use Illuminate\Database\Migrations\Migration;
use Emadadly\LaravelUuid\Uuids;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTeacher extends Migration
{

    use Uuids;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_teacher', function (Blueprint $table) {
            $table->uuid('id');

            $table->foreignUuid('teacher_id')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->string('stream');
            $table->string('level');
            $table->string('class');
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
        Schema::dropIfExists('class_teacher');
    }
}
