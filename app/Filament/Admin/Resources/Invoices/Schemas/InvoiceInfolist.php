<?php

namespace App\Filament\Admin\Resources\Invoices\Schemas;

use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class InvoiceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('Invoice Details'))
                    ->description(__('Detailed information about the invoice'))
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('invoice_number')
                                    ->label(__('Invoice number')),
                                TextEntry::make('customer.name')
                                    ->label(__('Customer'))
                                    ->url(fn ($record) => $record->customer ? route('filament.admin.resources.customers.view', $record->customer) : null),
                                TextEntry::make('issue_date')
                                    ->label(__('Date'))
                                    ->date(),
                                TextEntry::make('payment_due_date')
                                    ->label(__('Payment Due Date'))
                                    ->date(),
                                TextEntry::make('invoice_title')
                                    ->label(__('Invoice Title'))
                                    ->placeholder('-'),
                                TextEntry::make('created_at')
                                    ->label(__('Created at'))
                                    ->dateTime()
                                    ->placeholder('-'),
                            ]),
                    ]),
                Section::make(__('Amounts'))
                    ->description(__('Summary of the invoice amounts'))
                    ->schema([
                        TextEntry::make('subtotal')
                            ->money('dkk')
                            ->label(__('Subtotal'))
                            ->placeholder('-'),
                        TextEntry::make('tax')
                            ->label(__('Tax'))
                            ->money('dkk')
                            ->placeholder('-'),
                        TextEntry::make('total')
                            ->label(__('Total'))
                            ->money('dkk')
                            ->placeholder('-'),
                    ]),
                Section::make(__('Products or Services'))
                    ->description(__('Details of the products or services included in the invoice'))
                    ->schema([
                        RepeatableEntry::make('product_lines_for_infolist')
                            ->schema([
                                TextEntry::make('service_description')
                                    ->label(__('Description')),
                                TextEntry::make('quantity')
                                    ->label(__('Quantity')),
                                TextEntry::make('unit_price')
                                    ->label(__('Unit Price'))
                                    ->money('dkk'),
                                TextEntry::make('total')
                                    ->label(__('Total'))
                                    ->money('dkk'),
                            ])
                            ->hiddenLabel()
                            ->grid(2),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
