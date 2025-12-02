<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->text('quote_en');
            $table->text('quote_de')->nullable();
            $table->string('author');
            $table->string('role_en');
            $table->string('role_de')->nullable();
            $table->string('school_en');
            $table->string('school_de')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
