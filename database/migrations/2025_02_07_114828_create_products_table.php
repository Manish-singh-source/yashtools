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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_quantity');
            $table->string('product_price');
            $table->string('product_dispatch');
            $table->string('product_discription');
            $table->string('product_catalouge');
            $table->string('product_pdf');
            $table->string('product_drawing');
            $table->string('product_thumbain');
            $table->string('product_brand_id');
            $table->string('product_category_id');
            $table->string('product_sub_category_id');
            $table->string('product_arrivals');
            $table->string('product_sale');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
