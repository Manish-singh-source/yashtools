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
        if (Schema::hasTable('enquiry_products')) {
            Schema::table('enquiry_products', function (Blueprint $table) {
                if (!Schema::hasColumn('enquiry_products', 'quantity')) {
                    $table->integer('quantity')->default(1);
                }
                if (!Schema::hasColumn('enquiry_products', 'part_number')) {
                    $table->string('part_number')->nullable();
                }
                if (!Schema::hasColumn('enquiry_products', 'price')) {
                    $table->double('price', 8, 2)->nullable();
                }
                if (!Schema::hasColumn('enquiry_products', 'discount')) {
                    $table->double('discount')->nullable();
                }
                if (!Schema::hasColumn('enquiry_products', 'original_price')) {
                    $table->double('original_price', 8, 2)->nullable();
                }
                if (!Schema::hasColumn('enquiry_products', 'total_price')) {
                    $table->double('total_price')->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('enquiry_products')) {
            Schema::table('enquiry_products', function (Blueprint $table) {
                if (Schema::hasColumn('enquiry_products', 'quantity')) {
                    $table->dropColumn('quantity');
                }
                if (Schema::hasColumn('enquiry_products', 'part_number')) {
                    $table->dropColumn('part_number');
                }
                if (Schema::hasColumn('enquiry_products', 'price')) {
                    $table->dropColumn('price');
                }
                if (Schema::hasColumn('enquiry_products', 'discount')) {
                    $table->dropColumn('discount');
                }
                if (Schema::hasColumn('enquiry_products', 'original_price')) {
                    $table->dropColumn('original_price');
                }
                if (Schema::hasColumn('enquiry_products', 'total_price')) {
                    $table->dropColumn('total_price');
                }
            });
        }
    }
};
