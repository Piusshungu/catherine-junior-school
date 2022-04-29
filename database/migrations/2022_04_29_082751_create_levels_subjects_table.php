<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Emadadly\LaravelUuid\Uuids;

class CreateLevelsSubjectsTable extends Migration
{

    use Uuids;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels_subjects', function (Blueprint $table) {
            $table->foreignUuid('level_id')->references('id')->on('levels')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignUuid('subject_id')->references('id')->on('subjects')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->primary(['level_id', 'subject_id']);
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
        Schema::dropIfExists('levels_subjects');
    }
}
