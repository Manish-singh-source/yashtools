<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // First, clear any existing JSON data in lead_time column
            // since we're switching to file-based storage
            if (Schema::hasColumn('products', 'lead_time')) {
                // Clear existing data as we're changing the storage approach
                DB::table('products')->update(['lead_time' => null]);

                // Now change the column type
                $table->string('lead_time')->nullable()->change();
            } else {
                $table->string('lead_time')->nullable()->after('product_specs');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'lead_time')) {
                $table->text('lead_time')->nullable()->change();
            }
        });
    }
};
