<?php

namespace App\Filament\Admin\Resources\Graves\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class GraveInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label(__('Name')),
                TextEntry::make('area.name')
                    ->label(__('Area')),
                TextEntry::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime('d M Y H:i')
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label(__('Updated At'))
                    ->dateTime('d M Y H:i')
                    ->placeholder('-'),
            ]);
    }
}
