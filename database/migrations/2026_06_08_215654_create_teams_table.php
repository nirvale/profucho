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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('ranking');
            $table->integer('points')->default(0);
            $table->integer('goals_scored')->default(0);
            $table->integer('goals_conceded')->default(0);
            $table->integer('goals_difference')->default(0);
            $table->integer('fairplay')->default(0);
            $table->string('group',1);
            $table->integer('position');
            $table->string('group_position',2)->unique();
            $table->string('sixteen_position')->nullable()->unique();
            $table->string('eight_position')->nullable()->unique();
            $table->string('four_position')->nullable()->unique();
            $table->string('two_position')->nullable()->unique();
            $table->string('third_place')->nullable()->unique();
            $table->string('one_place')->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
