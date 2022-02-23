<?php

use Emadadly\LaravelUuid\Uuids;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentStudentTable extends Migration
{

    use Uuids;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_student', function (Blueprint $table) {
            $table->foreignUuid('parent_id')->references('id')->on('parents')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignUuid('student_id')->references('id')->on('students')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
            $table->primary(['parent_id', 'student_id']);
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
        Schema::dropIfExists('parent_student');
    }
}
