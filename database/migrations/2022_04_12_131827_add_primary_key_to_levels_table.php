<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Emadadly\LaravelUuid\Uuids;

class AddPrimaryKeyToLevelsTable extends Migration
{

    use Uuids;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('levels', function (Blueprint $table) {
            
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('levels', function (Blueprint $table) {
            //
        });
    }
}
