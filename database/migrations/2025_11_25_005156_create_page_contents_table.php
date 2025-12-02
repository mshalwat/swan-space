<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('section'); // hero, about, services, contact, etc.
            $table->string('key'); // title, description, badge, etc.
            $table->text('value_en');
            $table->text('value_de')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index(['section', 'key']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_contents');
    }
};
