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
        Schema::create('invoice_products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('invoice_id')->references('id')->on('invoices');
            $table->string('name')->nullable();
            $table->string('hsn_code');
            $table->string('description')->nullable();
            $table->string('sale_price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('gst_percentage');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_products');
    }
};
