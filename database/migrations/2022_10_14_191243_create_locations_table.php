<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('country');
            $table->string('address_1');
            $table->string('address_2');
            $table->string('city');
            $table->string('zone');
            $table->string('state');
            $table->string('zipcode');
            $table->string('lat');
            $table->string('lng');
            $table->string('type');
            $table->unsignedBigInteger('added_by');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('locations');
    }
}
