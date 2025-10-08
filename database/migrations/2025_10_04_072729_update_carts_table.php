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
        if (Schema::hasTable('carts')) {
            Schema::table('carts', function (Blueprint $table) {
                if (!Schema::hasColumn('carts', 'quantity')) {
                    $table->integer('quantity')->default(1);
                }
                if (!Schema::hasColumn('carts', 'price')) {
                    $table->double('price', 8, 2)->nullable();
                }
                if (!Schema::hasColumn('carts', 'discount')) {
                    $table->double('discount', 8, 2)->nullable();
                }
                if (!Schema::hasColumn('carts', 'original_price')) {
                    $table->double('original_price', 8, 2)->nullable();
                }
                if (!Schema::hasColumn('carts', 'total')) {
                    $table->double('total', 8, 2)->nullable();
                }
            });
        }        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('carts')) {
            Schema::table('carts', function (Blueprint $table) {
                if (Schema::hasColumn('carts', 'quantity')) {
                    $table->dropColumn('quantity');
                }
                if (Schema::hasColumn('carts', 'price')) {
                    $table->dropColumn('price');
                }
                if (Schema::hasColumn('carts', 'discount')) {
                    $table->dropColumn('discount');
                }
                if (Schema::hasColumn('carts', 'original_price')) {
                    $table->dropColumn('original_price');
                }
                if (Schema::hasColumn('carts', 'total')) {
                    $table->dropColumn('total');
                }
            });
        }
    }
};
