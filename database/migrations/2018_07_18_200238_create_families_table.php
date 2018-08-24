<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person')->index()->unsigned();
            $table->string('nationality',1);
            $table->string('document',12);
            $table->date('birthCertificate');
            $table->string('firstName',255);
            $table->string('lastName',255);
            $table->string('gender',1);
            $table->date('birthdate');
            $table->string('kin',1);
            $table->string('civilStatus',1);
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
        Schema::dropIfExists('families');
    }
}
