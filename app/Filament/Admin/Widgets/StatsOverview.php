<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Task;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('user_with_most_tasks_this_week', fn () => User::getUserWithMostTasksThisWeek())
                ->label(__('User with Most Tasks This Week')),
            Stat::make('user_with_most_hours_this_week', fn () => User::getUserWithMostHoursThisWeek())
                ->label(__('User with Most Hours This Week')),
            Stat::make('total_tasks_this_week', fn () => Task::getTotalTasksThisWeek())
                ->label(__('Total Submitted Tasks This Week')),
        ];
    }
}
