<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarss extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::HasTable('cars')) {
            Schema::create('cars', function (Blueprint $table) {
                $table->increments('id');
                $table->string('registration')->index();
                $table->integer('car_brand_id')->unsigned()->index()->nullable();
                $table->integer('car_model_id')->unsigned()->index()->nullable();
                $table->integer('car_body_id')->unsigned()->index()->nullable();
                $table->integer('creator_user_id')->unsigned()->index()->nullable();
                $table->integer('modifier_user_id')->unsigned()->index()->nullable();
                $table->timestamps();
                $table->foreign('car_brand_id')->references('id')->on('car_brands')->onDelete('set null');
                $table->foreign('car_model_id')->references('id')->on('car_models')->onDelete('set null');
                $table->foreign('car_body_id')->references('id')->on('car_bodies')->onDelete('set null');
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
        if (Schema::HasTable('cars')) {
            Schema::table('cars', function (Blueprint $table) {
                $table->dropForeign('cars_car_brand_id_foreign');
                $table->dropForeign('cars_car_model_id_foreign');
                $table->dropForeign('cars_car_body_id_foreign');
                $table->dropForeign('cars_creator_user_id_foreign');
                $table->dropForeign('cars_modifier_user_id_foreign');
            });
        }
        Schema::dropIfExists('cars');
    }
}
