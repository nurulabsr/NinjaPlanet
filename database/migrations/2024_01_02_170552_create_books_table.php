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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_name')->default('Book');
            $table->string('book_authors');
            $table->text('book_image')->nullable();
            $table->string('publish_year');
            $table->text('book_description');
            $table->integer('book_price')->default(0);
            $table->integer('category_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::table('books', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('books');
    }
};
