<?php

namespace App\Filament\Admin\Resources\Customers\Pages;

use App\Filament\Admin\Resources\Customers\CustomerResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCustomer extends EditRecord
{
    protected static string $resource = CustomerResource::class;

    public function getHeading(): string
    {
        return $this->record->name;
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
