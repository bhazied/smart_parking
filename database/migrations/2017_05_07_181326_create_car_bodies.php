<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarBodies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::HasTable('car_bodies')) {
            Schema::create('car_bodies', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->unique();
                $table->integer('creator_user_id')->unsigned()->index()->nullable();
                $table->integer('modifier_user_id')->unsigned()->index()->nullable();
                $table->timestamps();
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
        if (Schema::hasTable('car_bodies')) {
            Schema::table('car_bodies', function (Blueprint $table) {
                $table->dropForeign('car_bodies_creator_user_id_foreign');
                $table->dropForeign('car_bodies_modifier_user_id_foreign');
            });
        }
        Schema::dropIfExists('car_bodies');
    }
}
