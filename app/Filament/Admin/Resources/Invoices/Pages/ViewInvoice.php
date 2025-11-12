<?php

namespace App\Filament\Admin\Resources\Invoices\Pages;

use App\Filament\Admin\Resources\Invoices\InvoiceResource;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Icons\Heroicon;

class ViewInvoice extends ViewRecord
{
    protected static string $resource = InvoiceResource::class;

    public function getHeading(): string
    {
        return $this->record->invoice_number;
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('download')
                ->label(__('Download PDF'))
                ->icon(Heroicon::OutlinedArrowDownTray)
                ->action(function (Invoice $record) {
                    $pdf = Pdf::loadView('pdf.invoice', ['invoice' => $record]);

                    return response()->streamDownload(
                        fn () => print ($pdf->output()),
                        "Faktura_{$record->invoice_number}.pdf"
                    );
                }),
            EditAction::make(),
            DeleteAction::make(),
        ];
    }
}
