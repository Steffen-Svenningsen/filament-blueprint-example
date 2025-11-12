<?php

namespace App\Filament\Admin\Resources\Customers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('Customer name'))
                    ->required(),
                TextInput::make('phone')
                    ->label(__('Phone number'))
                    ->tel(),
                TextInput::make('email')
                    ->label(__('Email address'))
                    ->email(),
                TextInput::make('address')
                    ->label(__('Address')),
                TextInput::make('city')
                    ->label(__('City')),
            ]);
    }
}
