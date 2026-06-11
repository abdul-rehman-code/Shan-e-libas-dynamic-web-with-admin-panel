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
        Schema::table('products', function (Blueprint $table) {
            // nullable() is liye taake agar kisi purane product ka tag na bhi ho, toh error na aaye
            // after('price') ka matlab hai yeh column price wale column ke baad banega
            $table->string('tag')->nullable()->after('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Rollback karte waqt yeh column delete ho jaye
            $table->dropColumn('tag');
        });
    }
};
