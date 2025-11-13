<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceSetting;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function download(Invoice $invoice)
    {
        $user = Auth::user();

        if (! $user?->can('download', $invoice)) {
            abort(404);
        }

        $settings = InvoiceSetting::first();

        if (! $settings) {
            return back()->with('error', 'Please configure invoice settings before downloading invoices.');
        }

        $pdf = Pdf::loadView('pdf.invoice', [
            'invoice' => $invoice,
            'settings' => $settings,
        ]);

        return response()->streamDownload(
            fn () => print ($pdf->output()),
            "Faktura_{$invoice->invoice_number}.pdf"
        );
    }
}
