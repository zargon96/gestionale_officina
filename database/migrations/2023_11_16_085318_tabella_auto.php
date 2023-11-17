<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('auto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id')->default(0);
            $table->foreign('cliente_id')->references('id')->on('cliente')->onDelete('cascade');
            $table->string('modello');
            $table->string('targa');
            $table->string('n_telaio');
            $table->string('marca');
            $table->integer('anno');
            $table->integer('chilometri')->nullable();
            $table->string('note_stato')->nullable();
            $table->string('data_intervento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auto');
    }
};
