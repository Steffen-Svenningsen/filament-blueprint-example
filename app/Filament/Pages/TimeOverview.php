<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\TimeOverview as WidgetsTimeOverview;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

class TimeOverview extends Page
{
    protected string $view = 'filament.pages.time-overview';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClock;

    protected static ?int $navigationSort = 2;

    public function getTitle(): string|Htmlable
    {
        return __('Time Overview');
    }

    public static function getNavigationLabel(): string
    {
        return __('Time Overview');
    }

    protected function getFooterWidgets(): array
    {
        return [
            WidgetsTimeOverview::class,
        ];
    }
}
