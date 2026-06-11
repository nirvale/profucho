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
        Schema::table('profiles', function (Blueprint $table) {
          $table->integer('score_1')->default(0)->change();
          $table->integer('score_2')->default(0)->change();
          $table->integer('score_3')->default(0)->change();
          $table->integer('score_4')->default(0)->change();
          $table->integer('score_5')->default(0)->change();
          $table->integer('score_6')->default(0)->change();
          $table->integer('score_7')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->decimal('score_1',15,2)->default(0.00)->change();
            $table->decimal('score_2',15,2)->default(0.00)->change();
            $table->decimal('score_3',15,2)->default(0.00)->change();
            $table->decimal('score_4',15,2)->default(0.00)->change();
            $table->decimal('score_5',15,2)->default(0.00)->change();
            $table->decimal('score_6',15,2)->default(0.00)->change();
            $table->decimal('score_7',15,2)->default(0.00)->change();
        });
    }
};
