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
        Schema::create('orders_tracks', function (Blueprint $table) {
            $table->id();
            $table->string('enquiry_id');
            $table->string('order_status');
            $table->string('invoice_id');
            $table->string('courier_name');
            $table->string('courier_number');
            $table->string('courier_website');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_tracks');
    }
};
