<?php

namespace App\Filament\Resources\Tasks\Schemas;

use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Schema;

class TaskForm
{
    public static function configure(Schema $schema, int $step = 1): Schema
    {
        return $schema
            ->components([
                Wizard::make([])
                    ->columnSpanFull()
                    ->startOnStep($step),
            ]);
    }
}
