<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_clients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('car_types')->onDelete('cascade');
            $table->unsignedBigInteger('model_id');
            $table->foreign('model_id')->references('id')->on('car_models')->onDelete('cascade');
            $table->string('color')->nullable();
            $table->string('Plate_number')->nullable();
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
        Schema::dropIfExists('car_clients');
    }
}
