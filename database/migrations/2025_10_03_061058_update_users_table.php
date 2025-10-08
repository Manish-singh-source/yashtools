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
        if (Schema::hasTable('users') && !Schema::hasColumn('users', 'customer_type')) {
            Schema::table('users', function (Blueprint $table) {
                $table->enum('customer_type', ['loyal', 'dealer', 'regular'])
                      ->default('regular')
                      ->after('role');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('users') && Schema::hasColumn('users', 'customer_type')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('customer_type');
            });
        }
    }
};
