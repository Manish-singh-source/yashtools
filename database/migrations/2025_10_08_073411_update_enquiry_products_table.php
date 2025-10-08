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
        Schema::table('enquiry_products', function (Blueprint $table) {
            //
            $table->integer('quantity')->default(1);
            $table->string('part_number')->nullable();
            $table->double('price')->nullable();
            $table->double('discount', 8, 2)->nullable();
            $table->double('original_price', 8, 2)->nullable();
            $table->double('total_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enquiry_products', function (Blueprint $table) {
            //
            $table->dropColumn('quantity');
            $table->dropColumn('part_number');
            $table->dropColumn('price');
            $table->dropColumn('discount');
            $table->dropColumn('original_price');
            $table->dropColumn('total_price');
        });
    }
};
