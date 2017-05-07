<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateState extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('states')) {
            Schema::create('states', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->integer('region_id')->unsigned()->index()->nullable();
                $table->integer('country_id')->unsigned()->index()->nullable();
                $table->integer('creator_user_id')->unsigned()->index()->nullable();
                $table->integer('modifier_user_id')->unsigned()->index()->nullable();
                $table->timestamps();
                $table->foreign('region_id')->references('id')->on('regions')->onDelete('set null');
                $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
                $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('set null');
                $table->foreign('modifier_user_id')->references('id')->on('users')->onDelete('set null');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('states')) {
            Schema::table('states', function (Blueprint $table) {
                $table->dropForeign('states_region_id_foreign');
                $table->dropForeign('states_country_id_foreign');
                $table->dropForeign('states_creator_user_id_foreign');
                $table->dropForeign('states_modifier_user_id_foreign');
            });
        }
        Schema::dropIfExists('states');
    }
}
