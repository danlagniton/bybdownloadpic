<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DownloadController;

Route::get('/download-report/{token}', [DownloadController::class, 'download']);
    

