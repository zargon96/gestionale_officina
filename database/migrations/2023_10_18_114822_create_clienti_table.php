<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientiTable extends Migration
{
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cognome');
            $table->string('email');
            // $table->unsignedBigInteger('gruppo_cliente_id');
            // $table->foreign('gruppo_cliente_id')->references('id')->on('gruppi_clienti');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cliente'); 
    }
}

