<?php

namespace App\Filament\Admin\Resources\Invoices\Tables;

use App\Models\Invoice;
use App\Models\InvoiceSetting;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InvoicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('invoice_number')
                    ->label(__('Invoice number'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('customerWithTrashed.name')
                    ->label(__('Customer'))
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('issue_date')
                    ->label(__('Date'))
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('payment_due_date')
                    ->label(__('Payment Due Date'))
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('subtotal')
                    ->money('dkk')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('total')
                    ->money('dkk')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->deferColumnManager(false)
            ->filters([
                //
            ])
            ->recordActions([
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
            ])
            ->recordUrl(function ($record) {
                return route('filament.admin.resources.invoices.view', $record);
            })
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    Action::make('download')
                        ->label(__('Download PDFs'))
                        ->icon(Heroicon::OutlinedArrowDownTray),
                    // TODO: Implement bulk PDF download
                ]),
            ]);
    }
}
