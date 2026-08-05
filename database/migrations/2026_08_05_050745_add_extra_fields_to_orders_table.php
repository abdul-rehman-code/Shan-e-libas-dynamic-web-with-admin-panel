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
    Schema::table('orders', function (Blueprint $table) {
        $table->decimal('subtotal', 10, 2)->nullable()->after('shipping_address');
        $table->decimal('shipping', 10, 2)->default(0)->after('subtotal');
        $table->string('payment_screenshot')->nullable()->after('payment_status');
    });
}

public function down(): void
{
    Schema::table('orders', function (Blueprint $table) {
        $table->dropColumn(['subtotal', 'shipping', 'payment_screenshot']);
    });
}
};
