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
        Schema::table('airbuses', function (Blueprint $table) {
            $table->text('airbus_image');
            $table->integer('type_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('airbuses', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
