<?php

namespace App\Filament\Admin\Resources\Settings\Pages;

use App\Filament\Admin\Resources\Settings\SettingResource;
use App\Models\Setting;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSettings extends ListRecords
{
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        // إذا فيه سجل واحد أو أكثر، ما يظهر زر الإنشاء
        if (Setting::count() > 0) {
            return [];
        }

        return [
            CreateAction::make(),
        ];
    }
}
