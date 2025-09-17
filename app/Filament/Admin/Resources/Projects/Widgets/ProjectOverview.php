<?php

namespace App\Filament\Admin\Resources\Projects\Widgets;

use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProjectOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $projectCount = Project::count();
        $projectStarCount = Project::where('is_important', true)->count();
        $projectInactiveCount = Project::where('status', false)->count();

        return [
            Stat::make('📊 كمية المشاريع', $projectCount)
                ->description('إجمالي جميع المشاريع')
                ->descriptionIcon('heroicon-m-rectangle-stack')
                ->color('primary'),

            Stat::make('⭐ المشاريع المميزة', $projectStarCount)
                ->description('عدد المشاريع التي تم تمييزها')
                ->descriptionIcon('heroicon-m-star')
                ->color('success'),

            Stat::make('🚫 المشاريع الغير فعّالة', $projectInactiveCount)
                ->description('المشاريع التي تم إيقافها أو لم تُفعل')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger'),
        ];
    }
}
