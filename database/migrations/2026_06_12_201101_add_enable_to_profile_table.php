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
          $table->boolean('enabled_8')->default(0)->comment('0 = inactive, 1 = active')->after('score_7');
          $table->boolean('init_8')->default(0)->comment('0 = inactive, 1 = active')->after('enabled_8');
          $table->decimal('score_8',15,2)->default(0.00)->after('init_8');

          $table->boolean('enabled_9')->default(0)->comment('0 = inactive, 1 = active')->after('score_8');
          $table->boolean('init_9')->default(0)->comment('0 = inactive, 1 = active')->after('enabled_9');
          $table->decimal('score_9',15,2)->default(0.00)->after('init_9');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn(['score_9','init_9','enabled_9','score_8','init_8','enabled_8']);
        });
    }
};
