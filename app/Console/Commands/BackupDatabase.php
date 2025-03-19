<?php

namespace App\Console\Commands;

use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class BackupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup the database and store it in storage';

    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $dbName = env('DB_DATABASE');
        $dbUser = env('DB_USERNAME');
        $dbPass = env('DB_PASSWORD');
        $dbHost = env('DB_HOST');
        
        $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
        $fileName = "backup_{$timestamp}.sql";
        $filePath = storage_path("app/backups/{$fileName}");

        // Ensure the backup directory exists
        if (!Storage::exists('backups')) {
            Storage::makeDirectory('backups');
        }

        // Execute mysqldump command
        $command = "mysqldump --user={$dbUser} --password={$dbPass} --host={$dbHost} {$dbName} > {$filePath}";
        $output = null;
        $resultCode = null;
        exec($command, $output, $resultCode);

        if ($resultCode === 0) {
            $this->info("Database backup created successfully: {$fileName}");
        } else {
            $this->error("Database backup failed.");
        }
    }
}
