<?php

namespace App\Filament\Admin\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('المشاريع')
                    ->description('معلومات المشروع الأساسية')
                    ->icon('heroicon-o-briefcase') // أيقونة أنسب للمشاريع
                    ->schema([
                        TextInput::make('name')
                            ->label('اسم المشروع')
                            ->required()
                            ->placeholder('اكتب اسم المشروع هنا'),
                        TagsInput::make('project_skills')
                            ->label('المهارات المستخدمة')
                            ->placeholder('أضف المهارات هنا')
                            ->separator(',') // يفرق القيم بالفاصلة
                            ->suggestions(['Laravel', 'Livewire', 'Tailwind', 'Vue', 'React']),
                        MarkdownEditor::make('description')
                            ->label('وصف المشروع')
                            ->placeholder('اكتب تفاصيل المشروع...'),
                    ])->columnSpan(2),
                Section::make('الروابط')
                    ->description('ضع هنا روابط المشروع مثل GitHub والموقع الرسمي')
                    ->icon('heroicon-o-link')
                    ->schema([
                        TextInput::make('githup')
                            ->label('رابط القيت هاب')
                            ->url()
                            ->placeholder('https://github.com/username/repo')
                            ->prefixIcon('heroicon-o-code-bracket') // أيقونة كود
                            ->required(),

                        TextInput::make('links')
                            ->label('رابط الموقع')
                            ->url()
                            ->placeholder('https://example.com')
                            ->prefixIcon('heroicon-o-globe-alt'), // أيقونة موقع
                    ]),
                Section::make('الروابط')
                    ->description('ضع هنا روابط المشروع مثل GitHub والموقع الرسمي')
                    ->icon('heroicon-o-link')
                    ->schema([
                        FileUpload::make('image')
                            ->disk('public')
                            ->directory('projects')
                            ->image()
                            ->label('غلاف المشروع')
                            ->imagePreviewHeight('150')
                            ->openable()
                            ->downloadable(),
                    ])->columnSpanFull(),


            ])->columns(3);
    }
}
