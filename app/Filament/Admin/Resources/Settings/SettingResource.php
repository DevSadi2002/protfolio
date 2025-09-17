<?php

namespace App\Filament\Admin\Resources\Settings;

use App\Filament\Admin\Resources\Settings\Pages\CreateSetting;
use App\Filament\Admin\Resources\Settings\Pages\EditSetting;
use App\Filament\Admin\Resources\Settings\Pages\ListSettings;
use App\Filament\Admin\Resources\Settings\Schemas\SettingForm;
use App\Filament\Admin\Resources\Settings\Tables\SettingsTable;
use App\Models\Setting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    // أيقونة القائمة الجانبية
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    // اسم الحقل الذي يمثل العنوان
    protected static ?string $recordTitleAttribute = 'name';

    // اسم المجموعة في القائمة
    // protected static ?string $navigationGroup = 'الإعدادات العامة';

    // اسم المورد بالعربية
    public static function getModelLabel(): string
    {
        return 'إعداد';
    }

    public static function getPluralModelLabel(): string
    {
        return 'الإعدادات';
    }

    public static function form(Schema $schema): Schema
    {
        return SettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SettingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    // منع تكرار سجل الإعدادات (يُنشأ مرة واحدة فقط)
    public static function canCreate(): bool
    {
        return !Setting::exists();
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSettings::route('/'),
            'create' => CreateSetting::route('/create'),
            'edit' => EditSetting::route('/{record}/edit'),
        ];
    }
}
