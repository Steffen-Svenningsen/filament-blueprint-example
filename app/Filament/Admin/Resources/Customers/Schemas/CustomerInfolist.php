<?php

namespace App\Filament\Admin\Resources\Customers\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CustomerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label(__('Name')),
                TextEntry::make('phone')
                    ->label(__('Phone'))
                    ->placeholder('-'),
                TextEntry::make('email')
                    ->label(__('Email address'))
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->label(__('Created at'))
                    ->dateTime('d M Y H:i')
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label(__('Updated at'))
                    ->dateTime('d M Y H:i')
                    ->placeholder('-'),
            ]);
    }
}
