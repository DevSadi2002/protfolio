<?php

namespace App\Filament\Admin\Resources\Abouts;

use App\Filament\Admin\Resources\Abouts\Pages\CreateAbout;
use App\Filament\Admin\Resources\Abouts\Pages\EditAbout;
use App\Filament\Admin\Resources\Abouts\Pages\ListAbouts;
use App\Filament\Admin\Resources\Abouts\Schemas\AboutForm;
use App\Filament\Admin\Resources\Abouts\Tables\AboutsTable;
use App\Models\About;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUser;

    protected static ?string $recordTitleAttribute = 'صفحة التوصيف';

    public static function form(Schema $schema): Schema
    {
        return AboutForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AboutsTable::configure($table);
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
            'index' => ListAbouts::route('/'),
            'create' => CreateAbout::route('/create'),
            'edit' => EditAbout::route('/{record}/edit'),
        ];
    }
}
