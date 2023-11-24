<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('interventi', function (Blueprint $table) {
            $table->id();
            $table->text('note_stato')->nullable();
            $table->date('data_intervento')->nullable();
            $table->unsignedBigInteger('auto_id');
            $table->foreign('auto_id')->references('id')->on('auto')->onDelete('cascade');
            $table->timestamps();
        });
    }
    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interventi');
    }
};
