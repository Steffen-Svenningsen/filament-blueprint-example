<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class StatsOverview extends StatsOverviewWidget
{
    public function getColumns(): int|array
    {
        return 2;
    }

    protected function getStats(): array
    {
        $user = Auth::user();

        return [
            Stat::make('my_tasks_this_week', $user->tasks()->thisWeek()->count())
                ->label(__('Your Number of Submitted Tasks This Week')),
            Stat::make('my_hours_this_week', $user->tasks()->thisWeek()->sum('hours'))
                ->label(__('Your Number of Submitted Hours This Week incl. Breaks')),
        ];
    }
}
