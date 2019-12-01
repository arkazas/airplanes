<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAirplanes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airplanes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('model_id');
            $table->uuid('hangar_id');
            $table->string('serial_number', 15);
            $table->string('departure', 150);
            $table->string('arrival', 150);
            $table->timestamps();

            $table->foreign('model_id')
                ->references('id')
                ->on('airplanes_model')
                ->onDelete('cascade');

            $table->foreign('hangar_id')
                ->references('id')
                ->on('hangars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airplanes');
    }
}
