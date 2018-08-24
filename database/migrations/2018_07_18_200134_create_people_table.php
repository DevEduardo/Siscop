<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nationality',1);
            $table->string('document',12);
            $table->string('firstName',255);
            $table->string('lastName',255);
            $table->date('birthdate');
            $table->string('gender',1);
            $table->string('phone',15);
            $table->string('telephone',15);
            $table->string('email')->unique();
            $table->string('picture',300);
            $table->string('civilStatus',1);
            $table->timestamps();
            
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
        Schema::dropIfExists('people');
    }
}
