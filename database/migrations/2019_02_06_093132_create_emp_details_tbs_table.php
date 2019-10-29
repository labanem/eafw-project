<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpDetailsTbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_details_tbs', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->timestamps();
            $table->string('fname');
            $table->string('lname');
            $table->integer('deptid');
            $table->tinyinteger('weekid');
            $table->tinyinteger('empstatus');
            $table->integer('compid')->unsigned();
            $subdeptid->integer('subdeptid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('emp_details_tbs');
    }
}
