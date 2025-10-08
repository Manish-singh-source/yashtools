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
        if (Schema::hasTable('products')) {
            Schema::table('products', function (Blueprint $table) {
                $columns = [
                    'product_name',
                    'product_quantity',
                    'product_price',
                    'product_dispatch',
                    'product_thumbain',
                    'product_brand_id',
                    'product_category_id',
                    'product_sub_category_id'
                ];

                foreach ($columns as $column) {
                    if (Schema::hasColumn('products', $column)) {
                        // Make column nullable if it exists
                        $table->string($column)->nullable()->change();
                    } else {
                        // Add column as nullable if it doesn't exist
                        $table->string($column)->nullable();
                    }
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('products')) {
            Schema::table('products', function (Blueprint $table) {
                $columns = [
                    'product_name',
                    'product_quantity',
                    'product_price',
                    'product_dispatch',
                    'product_thumbain',
                    'product_brand_id',
                    'product_category_id',
                    'product_sub_category_id'
                ];

                foreach ($columns as $column) {
                    if (Schema::hasColumn('products', $column)) {
                        $table->string($column)->nullable(false)->change();
                    }
                }
            });
        }
    }
};
