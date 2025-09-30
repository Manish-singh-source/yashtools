<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class LeadTimeExcelService
{
    /**
     * Validate Lead Time Excel file
     *
     * @param UploadedFile $file
     * @return array
     */
    public function validateLeadTimeExcel(UploadedFile $file): array
    {
        try {
            // Validate file extension
            $allowedExtensions = ['xlsx', 'xls', 'csv'];
            $extension = $file->getClientOriginalExtension();

            if (!in_array(strtolower($extension), $allowedExtensions)) {
                throw new \Exception('Invalid file format. Only Excel files (.xlsx, .xls, .csv) are allowed.');
            }

            // Validate file size (max 10MB)
            if ($file->getSize() > 10240 * 1024) {
                throw new \Exception('File size too large. Maximum allowed size is 10MB.');
            }

            // Try to read the file to ensure it's valid
            $tempPath = $file->getPathname();
            $data = Excel::toArray([], $tempPath);

            if (empty($data) || empty($data[0])) {
                throw new \Exception('Excel file is empty or could not be read.');
            }

            $sheetData = $data[0];

            // Validate minimum structure (at least header row)
            if (count($sheetData) < 1) {
                throw new \Exception('Excel file must contain at least a header row.');
            }

            // Validate headers (first row should not be empty)
            $headers = $sheetData[0];
            $validHeaders = array_filter($headers, function($header) {
                return !empty(trim($header));
            });

            if (empty($validHeaders)) {
                throw new \Exception('Excel file must contain valid column headers.');
            }

            return [
                'success' => true,
                'message' => 'Lead Time Excel file is valid.',
                'rows_count' => count($sheetData) - 1
            ];

        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage(),
                'message' => 'Failed to validate Lead Time Excel file: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Save Lead Time Excel file to storage
     *
     * @param UploadedFile $file
     * @param string $directory
     * @return array
     */
    public function saveLeadTimeExcel(UploadedFile $file, string $directory = 'lead_time'): array
    {
        try {
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_lead_time.' . $extension;
            $uploadPath = public_path('/uploads/products/' . $directory);

            // Create directory if it doesn't exist
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }

            // Move file to destination
            $file->move($uploadPath, $filename);

            return [
                'success' => true,
                'filename' => $filename,
                'path' => $uploadPath . '/' . $filename,
                'message' => 'Lead Time Excel file saved successfully.'
            ];

        } catch (\Exception $e) {
            return [
                'success' => false,
                'filename' => null,
                'path' => null,
                'error' => $e->getMessage(),
                'message' => 'Failed to save Lead Time Excel file: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Delete Lead Time Excel file from storage
     *
     * @param string $filename
     * @param string $directory
     * @return bool
     */
    public function deleteLeadTimeExcel(string $filename, string $directory = 'lead_time'): bool
    {
        try {
            if (empty($filename)) {
                return false;
            }

            $filePath = public_path('/uploads/products/' . $directory . '/' . $filename);

            if (File::exists($filePath)) {
                File::delete($filePath);
                return true;
            }

            return false;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Read Excel data from saved file
     *
     * @param string $filename
     * @param string $directory
     * @return array
     */
    public function readLeadTimeExcel(string $filename, string $directory = 'lead_time'): array
    {
        try {
            if (empty($filename)) {
                return [
                    'success' => false,
                    'data' => null,
                    'message' => 'No filename provided.'
                ];
            }

            $filePath = public_path('/uploads/products/' . $directory . '/' . $filename);

            if (!File::exists($filePath)) {
                return [
                    'success' => false,
                    'data' => null,
                    'message' => 'Lead Time Excel file not found.'
                ];
            }

            // Read Excel data while preserving formatting
            $data = Excel::toArray([], $filePath);

            if (empty($data) || empty($data[0])) {
                return [
                    'success' => false,
                    'data' => null,
                    'message' => 'Excel file is empty or could not be read.'
                ];
            }

            return [
                'success' => true,
                'data' => $data[0], // First sheet data
                'message' => 'Lead Time Excel file read successfully.',
                'file_path' => $filePath
            ];

        } catch (\Exception $e) {
            return [
                'success' => false,
                'data' => null,
                'message' => 'Failed to read Lead Time Excel file: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Get Lead Time Excel file path
     *
     * @param string $filename
     * @param string $directory
     * @return string|null
     */
    public function getLeadTimeExcelPath(string $filename, string $directory = 'lead_time'): ?string
    {
        if (empty($filename)) {
            return null;
        }

        $filePath = public_path('/uploads/products/' . $directory . '/' . $filename);

        return File::exists($filePath) ? $filePath : null;
    }

    /**
     * Check if Lead Time Excel file exists
     *
     * @param string $filename
     * @param string $directory
     * @return bool
     */
    public function leadTimeExcelExists(string $filename, string $directory = 'lead_time'): bool
    {
        if (empty($filename)) {
            return false;
        }

        $filePath = public_path('/uploads/products/' . $directory . '/' . $filename);
        return File::exists($filePath);
    }
}
