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
        Schema::create('content_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_key')->unique(); // e.g., 'hero_en', 'hero_de', 'about_en'
            $table->string('language', 2); // 'en' or 'de'
            $table->string('section_type'); // 'hero', 'about', 'services', 'stats'
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('badge')->nullable();
            $table->text('description')->nullable();
            $table->json('data')->nullable(); // For flexible content like stats, highlights
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_sections');
    }
};
