<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtTbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ext_tbs', function (Blueprint $table) {
            $table->integer('extid')->unique();
            $table->timestamps();
            $table->integer('compid');
            $table->integer('empid');
            $table->integer('deptid');
            $table->tinyinteger('extstatus');
            $table->integer('sdeptid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ext_tbs');
    }
}
