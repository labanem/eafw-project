<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWkEmailsTbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wk_emails_tbs', function (Blueprint $table) {
            $table->timestamps();
            $table->integer('empid', 11);
            $table->string('id', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('wk_emails_tbs');
    }
}
