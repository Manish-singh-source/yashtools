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
            if (!Schema::hasColumn('products', 'lead_time')) { // <- add table name here
                Schema::table('products', function (Blueprint $table) {
                    $table->string('lead_time')->nullable()->after('product_specs');
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('products') && Schema::hasColumn('products', 'lead_time')) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn('lead_time');
            });
        }
    }
};
