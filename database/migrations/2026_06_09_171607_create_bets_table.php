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
        Schema::create('bets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('game_id')->constrained('games');
            $table->foreignId('stage_id')->constrained('stages');
            $table->integer('home_score_p')->nullable();
            $table->integer('away_score_p')->nullable();
            $table->foreignId('amount_id')->constrained('amounts');
            $table->decimal('score',15,2)->default(0.00);
            $table->boolean('status')->default(0)->comment('0 = unlocked, 1 = locked');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bets');
    }
};
