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
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn(['red_cards', 'yellow_cards']);
            $table->integer('home_rc')->default(0)->after('venue_id');
            $table->integer('home_yc')->default(0)->after('venue_id');
            $table->integer('away_rc')->default(0)->after('venue_id');
            $table->integer('away_yc')->default(0)->after('venue_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
          $table->integer('red_cards')->nullable();
          $table->integer('yellow_cards')->nullable();
          $table->dropColumn(['home_rc','home_yc','away_rc','away_yc']);
        });
    }
};
