<?php

namespace App\Filament\Admin\Resources\Invoices\Pages;

use App\Filament\Admin\Resources\Invoices\InvoiceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateInvoice extends CreateRecord
{
    protected static string $resource = InvoiceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $lines = $data['product_lines'] ?? [];

        $subtotal = collect($lines)->sum(fn ($line) => $line['total'] ?? 0);
        $tax = round($subtotal * 0.25, 2);
        $total = $subtotal + $tax;

        $data['subtotal'] = $subtotal;
        $data['tax'] = $tax;
        $data['total'] = $total;

        return $data;
    }
}
