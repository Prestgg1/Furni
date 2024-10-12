<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menuses', function (Blueprint $table) {
            $table->id();
            $table->json('menu_title')->default(new Expression('(JSON_ARRAY())'));
            $table->string('menu_url')->nullable()->unique();
            $table->integer('order')->default(0);
            $table->enum('isPrimary', [1, 0])->default(1);
            $table->enum('active', [1, 0])->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menuses');
    }
};
