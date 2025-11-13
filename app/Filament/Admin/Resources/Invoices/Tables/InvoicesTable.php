<?php

namespace App\Filament\Admin\Resources\Invoices\Tables;

use App\Models\Invoice;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
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
                    ->url(fn (Invoice $record) => route('invoices.download', $record), true),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->recordUrl(function ($record) {
                return route('filament.admin.resources.invoices.view', $record);
            })
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    // TODO: Implement download bulk action
                    // Action::make('download')
                    //     ->label(__('Download PDFs'))
                    //     ->icon(Heroicon::OutlinedArrowDownTray),
                ]),
            ]);
    }
}
