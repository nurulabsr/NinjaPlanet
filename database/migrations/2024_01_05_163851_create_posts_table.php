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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('post_title');
            $table->text('category_id');
            $table->text('post_thumnail');
            $table->text('pst_image');
            $table->text('post_video');
            $table->text('post_description');
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::table('posts', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('posts');
    }
};
