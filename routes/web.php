<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/invoices/{invoice}/download', [InvoiceController::class, 'download'])
    ->name('invoices.download');
