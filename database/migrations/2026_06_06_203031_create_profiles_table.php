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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(1)->comment('0 = inactive, 1 = active');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->boolean('enabled_1')->default(0)->comment('0 = inactive, 1 = active');
            $table->boolean('init_1')->default(0)->comment('0 = inactive, 1 = active');
            $table->decimal('score_1',15,2)->default(0.00);
            $table->boolean('enabled_2')->default(0)->comment('0 = inactive, 1 = active');
            $table->boolean('init_2')->default(0)->comment('0 = inactive, 1 = active');
            $table->decimal('score_2',15,2)->default(0.00);
            $table->boolean('enabled_3')->default(0)->comment('0 = inactive, 1 = active');
            $table->boolean('init_3')->default(0)->comment('0 = inactive, 1 = active');
            $table->decimal('score_3',15,2)->default(0.00);
            $table->boolean('enabled_4')->default(0)->comment('0 = inactive, 1 = active');
            $table->boolean('init_4')->default(0)->comment('0 = inactive, 1 = active');
            $table->decimal('score_4',15,2)->default(0.00);
            $table->boolean('enabled_5')->default(0)->comment('0 = inactive, 1 = active');
            $table->boolean('init_5')->default(0)->comment('0 = inactive, 1 = active');
            $table->decimal('score_5',15,2)->default(0.00);
            $table->boolean('enabled_6')->default(0)->comment('0 = inactive, 1 = active');
            $table->boolean('init_6')->default(0)->comment('0 = inactive, 1 = active');
            $table->decimal('score_6',15,2)->default(0.00);
            $table->boolean('enabled_7')->default(0)->comment('0 = inactive, 1 = active');
            $table->boolean('init_7')->default(0)->comment('0 = inactive, 1 = active');
            $table->decimal('score_7',15,2)->default(0.00);
            // $table->foreignId('user_type_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
