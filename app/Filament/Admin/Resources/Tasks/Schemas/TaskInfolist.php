<?php

namespace App\Filament\Admin\Resources\Tasks\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TaskInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('taskType.name')
                    ->label(__('Task type')),
                TextEntry::make('area.name')
                    ->label(__('Area'))
                    ->placeholder('-'),
                TextEntry::make('grave.name')
                    ->label(__('Grave'))
                    ->placeholder('-'),
                TextEntry::make('service.name')
                    ->label(__('Service')),
                TextEntry::make('customer.name')
                    ->label(__('Customer'))
                    ->placeholder('-'),
                TextEntry::make('user.name')
                    ->label(__('User')),
                TextEntry::make('workType.name')
                    ->label(__('Work type'))
                    ->placeholder('-'),
                TextEntry::make('hours')
                    ->numeric(),
                TextEntry::make('break_hours')
                    ->numeric(),
                TextEntry::make('comment')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
