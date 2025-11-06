<?php

namespace App\Filament\Admin\Resources\Areas;

use App\Filament\Admin\Resources\Areas\Pages\CreateArea;
use App\Filament\Admin\Resources\Areas\Pages\EditArea;
use App\Filament\Admin\Resources\Areas\Pages\ListAreas;
use App\Filament\Admin\Resources\Areas\Pages\ViewArea;
use App\Filament\Admin\Resources\Areas\Schemas\AreaForm;
use App\Filament\Admin\Resources\Areas\Schemas\AreaInfolist;
use App\Filament\Admin\Resources\Areas\Tables\AreasTable;
use App\Models\Area;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AreaResource extends Resource
{
    protected static ?string $model = Area::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMapPin;

    protected static ?int $navigationSort = 1;

    public static function getBreadcrumb(): string
    {
        return __('Areas');
    }

    public static function getModelLabel(): string
    {
        return __('Area');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Areas');
    }

    public static function getNavigationLabel(): string
    {
        return __('Areas');
    }

    public static function getNavigationGroup(): string|UnitEnum|null
    {
        return __('Resources');
    }

    public static function form(Schema $schema): Schema
    {
        return AreaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AreaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AreasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAreas::route('/'),
            'create' => CreateArea::route('/create'),
            'view' => ViewArea::route('/{record}'),
            'edit' => EditArea::route('/{record}/edit'),
        ];
    }
}
