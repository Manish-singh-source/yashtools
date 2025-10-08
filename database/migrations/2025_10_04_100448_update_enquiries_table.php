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
        if (Schema::hasTable('enquiries')) {
            Schema::table('enquiries', function (Blueprint $table) {
                if (!Schema::hasColumn('enquiries', 'price')) {
                    $table->double('price', 8, 2)->nullable();
                }
                if (!Schema::hasColumn('enquiries', 'discount')) {
                    $table->double('discount')->nullable();
                }
                if (!Schema::hasColumn('enquiries', 'original_price')) {
                    $table->double('original_price', 8, 2)->nullable();
                }
                if (!Schema::hasColumn('enquiries', 'total_price')) {
                    $table->double('total_price', 8, 2)->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('enquiries')) {
            Schema::table('enquiries', function (Blueprint $table) {
                if (Schema::hasColumn('enquiries', 'price')) {
                    $table->dropColumn('price');
                }
                if (Schema::hasColumn('enquiries', 'discount')) {
                    $table->dropColumn('discount');
                }
                if (Schema::hasColumn('enquiries', 'original_price')) {
                    $table->dropColumn('original_price');
                }
                if (Schema::hasColumn('enquiries', 'total_price')) {
                    $table->dropColumn('total_price');
                }
            });
        }
    }
};
