<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruzParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gruz_parameters', function (Blueprint $table) {
            $table->id();
            $table->string('length');
            $table->string('width');
            $table->string('height');
            $table->string('weight');
            $table->string('volume');
            $table->string('adr');
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
        Schema::dropIfExists('gruz_parameters');
    }
}
