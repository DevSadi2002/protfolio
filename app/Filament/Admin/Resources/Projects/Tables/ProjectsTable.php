<?php

namespace App\Filament\Admin\Resources\Projects\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('name')
                    ->label('اسم المشروع')
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('image')
                    ->label('الغلاف')
                    ->disk('public')   // مهم
                    ->circular()
                    ->size(60),
                TextColumn::make('description')
                    ->label('الوصف')
                    ->limit(50) // عرض 50 حرف فقط
                    ->toggledHiddenByDefault(true)
                    ->tooltip(fn($record) => $record->description),
                TextColumn::make('project_skills')
                    ->badge()
                    ->label('المهارات'),
                TextColumn::make('githup')
                    ->label('رابط GitHub')
                    ->url(fn($record) => $record->githup, true)
                    ->openUrlInNewTab(),

                TextColumn::make('links')
                    ->label('رابط الموقع')
                    ->url(fn($record) => $record->links, true)
                    ->openUrlInNewTab(),



                TextColumn::make('created_at')
                    ->label('تاريخ الإضافة')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                // تقدر تضيف فلتر هنا مثل فلترة حسب التاريخ أو المهارات
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
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
