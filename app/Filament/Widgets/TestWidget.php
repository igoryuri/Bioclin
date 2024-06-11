<?php

namespace App\Filament\Widgets;

use App\Models\Line;
use App\Models\Product;
use App\Models\User;
use Filament\Forms\Components\Section;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TestWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('New users that have joined')
                ->descriptionIcon('heroicon-m-user-group', IconPosition::Before)
                ->color('success'),
            Stat::make('Total Products', Product::count())
                ->description('New users that have joined')
                ->descriptionIcon('heroicon-m-user-group', IconPosition::Before)
                ->color('success'),
            Stat::make('Total Lines', Line::count())
                ->description('New users that have joined')
                ->descriptionIcon('heroicon-m-user-group', IconPosition::Before)
                ->color('success'),

        ];
    }
}
