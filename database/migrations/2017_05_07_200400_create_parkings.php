<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('parkings')) {
            Schema::create('parkings', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->unique();
                $table->integer('capacity');
                $table->longText('description');
                $table->string('lattitude')->nullable();
                $table->string('longitude')->nullable();
                $table->dateTime('opening_time')->nullable();
                $table->dateTime('closure_time')->nullable();
                $table->json('day_of_work')->nullable();
                $table->boolean('has_wash')->default(false);
                $table->boolean('has_coffee')->default(false);
                $table->boolean('has_shop')->default(false);
                $table->boolean('is_opened')->default(false);
                $table->boolean('is_24_opened')->default(false);
                $table->boolean('is_7_opened')->default(false);
                $table->integer('region_id')->unsigned()->index()->nullable();
                $table->integer('state_id')->unsigned()->index()->nullable();
                $table->integer('creator_user_id')->unsigned()->index()->nullable();
                $table->integer('modifier_user_id')->unsigned()->index()->nullable();
                $table->timestamps();
                $table->foreign('region_id')->references('id')->on('regions')->onDelete('set null');
                $table->foreign('state_id')->references('id')->on('states')->onDelete('set null');
                $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('set null');
                $table->foreign('modifier_user_id')->references('id')->on('users')->onDelete('set null');
                //DB::statement('ALTER TABLE parkings ADD FULLTEXT search_description(description)');
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
        if (Schema::hasTable('parkings')) {
            Schema::table('parkings', function (Blueprint $table) {
                //$table->dropIndex('search_description');
                /*$table->dropForeign('parkings_state_id_foreign');
                $table->dropForeign('parkings_region_id_foreign');
                $table->dropForeign('parkings_creator_user_id_foreign');
                $table->dropForeign('parkings_modifier_user_id_foreign');*/
            });
        }
        Schema::dropIfExists('parkings');
    }
}
