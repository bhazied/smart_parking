<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create countries table
        
        Schema::create('countries', function(Blueprint $table){
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('code')->unique();
            $table->string('long_code');
            $table->string('prefix');
            $table->string('picture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop table Countries
        Schema::drop('countries');

    }
}
