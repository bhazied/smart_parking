<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserNewAttribute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('enabled')->default(false);
            $table->boolean('locked')->default(false);
            $table->dateTime('last_success_login')->nullable();
            $table->dateTime('last_failure_login')->nullable();
            $table->integer('nb_success_login')->unsigned()->default(0);
            $table->integer('nb_failure_login')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->removeColumn('enabled');
            $table->removeColumn('locked');
            $table->removeColumn('last_success_login');
            $table->removeColumn('last_failure_login');
            $table->removeColumn('nb_success_login');
            $table->removeColumn('nb_failure_login');
        });
    }
}
