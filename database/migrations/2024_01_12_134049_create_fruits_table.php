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
        Schema::create('fruits', function (Blueprint $table) {
            $table->id();
            $table->string('fruit_name');
            $table->text('fruit_description');
            $table->string('fruit_scientific_name');
            $table->string('fruit_family');
            $table->string('fruit_genus');
            $table->string('fruit_origin');
            $table->date('fruit_harvest_season');
            $table->text('fruit_nutritional_information');
            $table->string('fruit_storage_conditions');
            $table->string('fruit_shelf_life');
            $table->decimal('fruit_price');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::table('fruits', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('fruits');
    }
};
