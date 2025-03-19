<?php

namespace App\Console\Commands;

use App\Models\Enquiry;
use App\Models\EnquiryProducts;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class DeleteOldEnquiries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'enquiries:delete-old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete enquiries older than one month';

    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Delete enquiries older than 1 month
        $deleted = Enquiry::where('created_at', '<', Carbon::now()->subMonth())->delete();
        $deletedProducts = EnquiryProducts::whereNotIn('enquiry_id', function ($query) {
            $query->select('id')->from('enquiries');
        })->delete();
        // $deletedProducts = EnquiryProducts::where('created_at', '<', Carbon::now()->subMonth())->delete();
        $this->info("Deleted $deleted old enquiries.");
        $this->info("Deleted $deletedProducts old enquiry products.");
    }
}
