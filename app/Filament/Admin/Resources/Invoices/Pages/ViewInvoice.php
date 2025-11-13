<?php

namespace App\Filament\Admin\Resources\Invoices\Pages;

use App\Filament\Admin\Resources\Invoices\InvoiceResource;
use App\Models\Invoice;
use App\Models\InvoiceSetting;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
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
                    $settings = InvoiceSetting::first();

                    if (! $settings) {
                        Notification::make()
                            ->title(__('Invoice settings are not configured.'))
                            ->body(__('Please configure the invoice settings before downloading invoices.'))
                            ->danger()
                            ->send();

                        return;
                    }

                    $pdf = Pdf::loadView('pdf.invoice', [
                        'invoice' => $record,
                        'settings' => $settings,
                    ]);

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
