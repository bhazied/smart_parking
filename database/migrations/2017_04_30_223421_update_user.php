<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users')) {
            if (!Schema::hasColumn('user', 'country_id')) {
                Schema::table('users', function (Blueprint $table) {
                    $table->integer('country_id')->unsigned()->index()->nullable();
                    $table->foreign('country_id')->references('id')->on('countries');
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropForeign('users_country_id_foreign');
            });
        }
    }
}
