<?php

namespace App\Filament\Admin\Resources\Users\Pages;

use App\Filament\Admin\Resources\Users\RelationManagers\TasksRelationManager;
use App\Filament\Admin\Resources\Users\UserResource;
use App\Filament\Admin\Widgets\TimeOverview;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    public function getHeading(): string
    {
        return $this->record->name;
    }

    public function getTitle(): string|Htmlable
    {
        return $this->record->name;
    }

    public function getFooterWidgets(): array
    {
        return [
            TimeOverview::make([
                'userId' => $this->record->id,
            ]),
        ];
    }

    public function getRelationManagers(): array
    {
        return [
            TasksRelationManager::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->extraAttributes(['class' => 'fi-button-secondary page-header-action']),
            DeleteAction::make(),
        ];
    }
}
