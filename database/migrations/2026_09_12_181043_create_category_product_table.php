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
        Schema::create('category_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        // Migrate existing data
        $products = \Illuminate\Support\Facades\DB::table('products')->whereNotNull('category_id')->get();
        foreach ($products as $product) {
            \Illuminate\Support\Facades\DB::table('category_product')->insert([
                'category_id' => $product->category_id,
                'product_id' => $product->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Drop column from products
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('cascade');
        });

        $productCategories = \Illuminate\Support\Facades\DB::table('category_product')->get();
        foreach ($productCategories as $pc) {
            // Just take the first category we find and assign back
            \Illuminate\Support\Facades\DB::table('products')
                ->where('id', $pc->product_id)
                ->whereNull('category_id')
                ->update(['category_id' => $pc->category_id]);
        }

        Schema::dropIfExists('category_product');
    }
};
