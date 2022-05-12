<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Emadadly\LaravelUuid\Uuids;

class CreateResultsTable extends Migration
{

    use Uuids;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('subject');
            $table->foreignUuid('student_id')->references('id')->on('students')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->decimal('score', 6,2);
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
        Schema::dropIfExists('results');
    }
}
