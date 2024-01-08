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
        Schema::create('russian_languages', function (Blueprint $table) {
            $table->id();
            $table->string('russian_word')->unique()->collation('utf8mb4_unicode_ci');
            $table->string('russian_word_meaning')->unique()->collation('utf8mb4_unicode_ci');
            $table->integer('russian_language_category_id')->unique()->collation('utf8mb4_unicode_ci');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   Schema::table('russian_languages', function(Blueprint $table){
       $table->dropSoftDeletes();
    });
        Schema::dropIfExists('russian_languages');
    }
};
