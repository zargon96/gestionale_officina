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
        Schema::table('cliente', function (Blueprint $table) {
            $table->unsignedBigInteger('gruppo_cliente_id')->nullable();
            $table->foreign('gruppo_cliente_id')->references('id')->on('gruppi_clienti');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cliente', function (Blueprint $table) {
            $table->dropForeign(['gruppo_cliente_id']);
            $table->dropColumn('gruppo_cliente_id'); 
        });
    }
};
