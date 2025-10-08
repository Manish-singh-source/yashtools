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
        if (Schema::hasTable('products')) {

            // First, clear any existing data if the column exists
            if (Schema::hasColumn('products', 'lead_time')) {
                DB::table('products')->update(['lead_time' => null]);
            }

            // Now modify or create the column
            Schema::table('products', function (Blueprint $table) {
                if (Schema::hasColumn('products', 'lead_time')) {
                    $table->string('lead_time')->nullable()->change();
                } else {
                    $table->string('lead_time')->nullable()->after('product_specs');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('products') && Schema::hasColumn('products', 'lead_time')) {
            Schema::table('products', function (Blueprint $table) {
                $table->text('lead_time')->nullable()->change();
            });
        }
    }
};
