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
        Schema::create('order_items', function (Blueprint $table) {
        $table->id();
        $table->foreignId('order_id')->constrained()->onDelete('cascade'); // hubungkan ke orders
        $table->foreignId('buku_id')->constrained()->onDelete('cascade'); // hubungkan ke buku
        $table->integer('qty');
        $table->decimal('harga', 12, 2); // harga per buku saat checkout
        $table->decimal('subtotal', 12, 2); // harga * qty
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
