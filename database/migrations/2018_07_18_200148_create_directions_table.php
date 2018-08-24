<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person')->index()->unsigned();
            $table->string('country',5);
            $table->string('city',5);
            $table->string('municipality',5);
            $table->string('parish',5);
            $table->string('sector',255);
            $table->string('street',255);
            $table->string('dwelling',255);
            $table->timestamps();

            $table->foreign('person')->references('id')->on('people')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directions');
    }
}
