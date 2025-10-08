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
        if (Schema::hasTable('user_details')) {
            $columns = [
                'company_name',
                'company_address',
                'city',
                'state',
                'country',
                'pincode',
                'gstin'
            ];

            Schema::table('user_details', function (Blueprint $table) use ($columns) {
                foreach ($columns as $column) {
                    if (Schema::hasColumn('user_details', $column)) {
                        $table->string($column)->nullable()->change();
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
        if (Schema::hasTable('user_details')) {
            $columns = [
                'company_name',
                'company_address',
                'city',
                'state',
                'country',
                'pincode',
                'gstin'
            ];

            Schema::table('user_details', function (Blueprint $table) use ($columns) {
                foreach ($columns as $column) {
                    if (Schema::hasColumn('user_details', $column)) {
                        $table->string($column)->nullable(false)->change();
                    }
                }
            });
        }
    }
};
