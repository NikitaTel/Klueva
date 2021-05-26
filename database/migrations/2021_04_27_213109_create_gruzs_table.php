<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruzsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gruzs', function (Blueprint $table) {
            $table->id();
            $table->date('date_in');
            $table->integer('user_id');
            $table->date('date_out');
            $table->string('country_from');
            $table->string('city_from');
            $table->string('country_to');
            $table->string('city_to');
            $table->string('name');
            $table->string('body_type');
            $table->integer('parameter_id');
            $table->string('loading_type');
            $table->integer('summa');
            $table->string('currency');
            $table->string('payment_type');
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
        Schema::dropIfExists('gruzs');
    }
}
