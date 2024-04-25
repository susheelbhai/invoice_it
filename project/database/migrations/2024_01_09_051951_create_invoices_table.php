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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('serial_number')->nullable();
            $table->timestamps();
            $table->string('invoice_number')->nullable();
            $table->date('invoice_date')->nullable();
            $table->foreignId('business_id')->references('id')->on('businesses');
            $table->string('business_cin')->nullable();
            $table->string('business_gstin')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_email')->nullable();
            $table->string('business_phone')->nullable();
            $table->string('business_address')->nullable();
            $table->string('business_city')->nullable();
            $table->string('business_pin')->nullable();
            $table->string('business_state_id')->nullable()->references('id')->on('states');
            $table->foreignId('customer_id')->references('id')->on('customers');
            $table->string('customer_gstin')->nullable();
            $table->string('customer_name');
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('customer_city')->nullable();
            $table->string('customer_pin')->nullable();
            $table->string('customer_state_id')->nullable()->references('id')->on('states');
            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_account_holder_name')->nullable();
            $table->string('bank_ifsc')->nullable();
            $table->string('bank_swift')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
