<?php

namespace App\Filament\Widgets;

use App\Models\Message;
use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('عدد الرسائل', Message::count())
                ->description('جميع رسائل التواصل')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('success'),

            Stat::make('عدد المشاريع', Project::count())
                ->description('المشاريع الموجودة')
                ->descriptionIcon('heroicon-m-folder')
                ->color('info'),

            Stat::make('عدد الزوار', file_exists(storage_path('app/visitors.txt'))
                ? file_get_contents(storage_path('app/visitors.txt'))
                : 0)
                ->description('إجمالي زيارات الموقع')
                ->descriptionIcon('heroicon-m-users')
                ->color('warning'),
        ];
    }
}