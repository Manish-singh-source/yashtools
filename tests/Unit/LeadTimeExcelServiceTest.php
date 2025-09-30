<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\LeadTimeExcelService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class LeadTimeExcelServiceTest extends TestCase
{
    protected $leadTimeService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->leadTimeService = new LeadTimeExcelService();
    }

    public function test_validate_lead_time_excel_with_invalid_extension()
    {
        $file = UploadedFile::fake()->create('test.txt', 100);

        $result = $this->leadTimeService->validateLeadTimeExcel($file);

        $this->assertFalse($result['success']);
        $this->assertStringContainsString('Invalid file format', $result['error']);
    }

    public function test_validate_lead_time_excel_with_large_file()
    {
        // Create a file larger than 10MB (10240 KB)
        $file = UploadedFile::fake()->create('test.xlsx', 11000);

        $result = $this->leadTimeService->validateLeadTimeExcel($file);

        $this->assertFalse($result['success']);
        $this->assertStringContainsString('File size too large', $result['error']);
    }

    public function test_delete_lead_time_excel_non_existent_file()
    {
        $result = $this->leadTimeService->deleteLeadTimeExcel('non_existent_file.xlsx');
        $this->assertFalse($result);
    }

    public function test_delete_lead_time_excel_empty_filename()
    {
        $result = $this->leadTimeService->deleteLeadTimeExcel('');
        $this->assertFalse($result);
    }

    public function test_read_lead_time_excel_empty_filename()
    {
        $result = $this->leadTimeService->readLeadTimeExcel('');

        $this->assertFalse($result['success']);
        $this->assertEquals('No filename provided.', $result['message']);
    }

    public function test_read_lead_time_excel_non_existent_file()
    {
        $result = $this->leadTimeService->readLeadTimeExcel('non_existent_file.xlsx');

        $this->assertFalse($result['success']);
        $this->assertEquals('Lead Time Excel file not found.', $result['message']);
    }

    public function test_get_lead_time_excel_path_empty_filename()
    {
        $result = $this->leadTimeService->getLeadTimeExcelPath('');
        $this->assertNull($result);
    }

    public function test_lead_time_excel_exists_empty_filename()
    {
        $result = $this->leadTimeService->leadTimeExcelExists('');
        $this->assertFalse($result);
    }

    public function test_lead_time_excel_exists_non_existent_file()
    {
        $result = $this->leadTimeService->leadTimeExcelExists('non_existent_file.xlsx');
        $this->assertFalse($result);
    }
}
