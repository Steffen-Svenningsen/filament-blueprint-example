<?php

namespace App\Filament\Admin\Resources\Tasks\Pages;

use App\Filament\Admin\Resources\Tasks\TaskResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTasks extends ListRecords
{
    protected static string $resource = TaskResource::class;

    public function getHeading(): string
    {
        return __('Tasks');
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
