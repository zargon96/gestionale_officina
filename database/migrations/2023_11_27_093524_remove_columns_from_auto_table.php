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
        Schema::table('auto', function (Blueprint $table) {
            $table->dropColumn('note_stato');
            $table->dropColumn('data_intervento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('auto', function (Blueprint $table) {
            $table->text('note_stato')->nullable();
            $table->date('data_intervento')->nullable();
        });
    }
};
