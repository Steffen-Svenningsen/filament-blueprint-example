<?php

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),
                TextInput::make('username')
                    ->label(__('Username'))
                    ->required()
                    ->unique(),
                TextInput::make('email')
                    ->label(__('Email address'))
                    ->email()
                    ->unique(),
                TextInput::make('password')
                    ->label(__('Password'))
                    ->password()
                    ->required(),
            ]);
    }
}
