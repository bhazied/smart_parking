<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchemaCarModels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('car_models')) {
            Schema::create('car_models', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->integer('car_brand_id')->unsigned()->index()->nullable();
                $table->integer('creator_user_id')->unsigned()->index()->nullable();
                $table->integer('modifier_user_id')->unsigned()->index()->nullable();
                $table->timestamps();
                $table->foreign('car_brand_id')->references('id')->on('car_brands')->onDelete('set null');
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
        if (Schema::hasTable('car_models')) {
            Schema::table('car_models', function (Blueprint $table) {
                $table->dropForeign('car_models_car_brand_id_foreign');
                $table->dropForeign('car_models_creator_user_id_foreign');
                $table->dropForeign('car_models_modifier_user_id_foreign');
            });
        }
        Schema::dropIfExists('car_models');
    }
}
