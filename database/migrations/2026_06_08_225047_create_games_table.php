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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->DateTime('date');
            $table->time('time');
            $table->foreignId('stage_id')->constrained('stages');
            $table->foreignId('home_team_id')->nullable()->constrained('teams');
            $table->foreignId('away_team_id')->nullable()->constrained('teams');
            $table->integer('home_score')->nullable();
            $table->integer('away_score')->nullable();
            $table->integer('red_cards')->nullable();
            $table->integer('yellow_cards')->nullable();
            $table->string('home_g_team_id')->nullable();
            $table->string('away_g_team_id')->nullable();
            $table->foreignId('venue_id')->constrained('venues');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
