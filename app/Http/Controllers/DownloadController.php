<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class DownloadController extends Controller
{
    public function download($token)
    {
        // Validate the token and check user permissions
        if (!$this->isValidToken($token)) {
            return response()->json(['error' => 'Invalid download link.'], 403);
        }

        // Mock data for the PDF file path
        $filePath = 'reports/sample-report.pdf';

        // Check if the file exists
        if (!Storage::exists($filePath)) {
            return response()->json(['error' => 'File not found.'], 404);
        }

        // Return the file as a response
        return Response::download(storage_path("app/{$filePath}"));
    }

    private function isValidToken($token)
    {
        // Mock validation logic for the token
        // In a real application, you would check the token against a database or cache
        return $token === 'valid-token'; // Example of a valid token
    }
}