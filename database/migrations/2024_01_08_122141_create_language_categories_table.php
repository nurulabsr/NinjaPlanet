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
        Schema::create('language_categories', function (Blueprint $table) {
            $table->id();
            $table->string('language_categories')->default('Russian'); //->unique()->collation('utf8mb4_unicode_ci');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   Schema::table('language_categories', function(Blueprint $table){
        $table->dropSoftDeletes();
    });
        Schema::dropIfExists('language_categories');
    }
};
