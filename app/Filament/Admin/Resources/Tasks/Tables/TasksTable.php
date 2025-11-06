<?php

namespace App\Filament\Admin\Resources\Tasks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TasksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('taskTypeWithTrashed.name')
                    ->label(__('Task Type'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('areaWithTrashed.name')
                    ->label(__('Area'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('graveWithTrashed.name')
                    ->label(__('Grave'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('serviceWithTrashed.name')
                    ->label(__('Service'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('customerWithTrashed.name')
                    ->label(__('Customer'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('userWithTrashed.name')
                    ->label(__('User'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('workTypeWithTrashed.name')
                    ->label(__('Work Type'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('hours')
                    ->label(__('Hours'))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('break_hours')
                    ->label(__('Break Hours'))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('Updated At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
