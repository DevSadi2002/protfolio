<?php

namespace App\Filament\Admin\Resources\Settings\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('الرقم')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('copyright_holder')
                    ->label('الاسم')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email')
                    ->label('البريد الإلكتروني')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('githup')
                    ->label('رابط GitHub')
                    ->url(fn($record) => $record->githup, true)
                    ->openUrlInNewTab(),
                TextColumn::make('instgram')
                    ->label('رابط instgram')
                    ->url(fn($record) => $record->githup, true)
                    ->openUrlInNewTab(),

                TextColumn::make('linkedin')
                    ->label('رابط linkedin')
                    ->url(fn($record) => $record->links, true)
                    ->openUrlInNewTab(),
                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                // يمكنك إضافة الفلاتر هنا حسب الحاجة
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make()
                        ->label('عرض')
                        ->icon('heroicon-o-eye'),
                    EditAction::make()
                        ->label('تعديل')
                        ->icon('heroicon-o-pencil'),
                    DeleteAction::make()
                        ->label('حذف')
                        ->icon('heroicon-o-trash')
                        ->requiresConfirmation(),
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('حذف المحدد')
                        ->requiresConfirmation(),
                ]),
            ])
            ->defaultSort('created_at', 'desc'); // ترتيب افتراضي حسب الأحدث
    }
}
