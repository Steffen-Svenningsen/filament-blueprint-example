<?php

namespace App\Filament\Resources\Tasks\Pages;

use App\Filament\Resources\Tasks\TaskResource;
use App\Filament\Wizard\TaskWizardSteps;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\Concerns\HasWizard;
use Filament\Resources\Pages\EditRecord;

class EditTask extends EditRecord
{
    use HasWizard;

    protected static string $resource = TaskResource::class;

    protected function getSteps(): array
    {
        return TaskWizardSteps::getWizardSteps();
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
