<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarBrands extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('car_brands')) {
            Schema::create('car_brands', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
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
        if (Schema::hasTable('car_brands')) {
            Schema::table('car_brands', function (Blueprint $table) {
                $table->dropForeign('car_brands_creator_user_id_foreign');
                $table->dropForeign('car_brands_modifier_user_id_foreign');
            });
        }
        Schema::dropIfExists('car_types');
    }
}
