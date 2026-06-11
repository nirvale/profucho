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
        Schema::table('bets', function (Blueprint $table) {
          $table->integer('score')
               // ->unsigned()      // Solo si la original era unsigned
               ->default(0)      // Solo si tenía un valor por defecto
               ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bets', function (Blueprint $table) {
            $table->decimal('score',15,2)->default(0.00)->change();
        });
    }
};
