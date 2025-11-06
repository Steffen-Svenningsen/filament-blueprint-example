<?php

namespace App\Filament\Admin\Resources\Tasks\Pages;

use App\Filament\Admin\Resources\Tasks\TaskResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTask extends EditRecord
{
    protected static string $resource = TaskResource::class;

    public function getHeading(): string
    {
        return __('Task').' #'.$this->record->id;
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
