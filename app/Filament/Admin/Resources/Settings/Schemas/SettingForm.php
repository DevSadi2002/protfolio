<?php

namespace App\Filament\Admin\Resources\Settings\Schemas;

use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

use function Laravel\Prompts\form;

class SettingForm
{

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Flex::make(schema: [
                    Grid::make()
                        ->columns([
                            'sm' => 1, // موبايل
                            'md' => 2, // تابلت
                            'lg' => 3, // شاشة كبيرة
                        ])
                        ->gap(6)
                        ->schema([
                            Section::make('حقوق النشر')
                                ->description('معلومات صاحب الموقع')
                                ->icon(Heroicon::DocumentText)
                                ->schema([
                                    TextInput::make('copyright_holder')
                                        ->label('صاحب الحقوق')
                                        ->required(),
                                    TextInput::make('job')
                                        ->label('المسمى الوظيفي')
                                        ->required(),
                                    TextInput::make('compane_job')
                                        ->label('الشركة التي تعمل فيها حالياً'),
                                    TextInput::make('job_link')
                                        ->label('رابط الشركة التي تعمل فيها حالياً')
                                        ->url()
                                        ->nullable(),
                                    TextInput::make('copyright_holder')
                                        ->label('صاحب الحقوق')
                                        ->required(),
                                    TextInput::make('copyright_start')
                                        ->label('سنة البداية')
                                        ->numeric()
                                        ->required(),
                                    TextInput::make('copyright_end')
                                        ->label('سنة النهاية')
                                        ->numeric(),
                                ])
                                ->columns(1)
                                ->extraAttributes(['class' => 'bg-gray-50 dark:bg-gray-800 p-4 rounded-lg shadow-sm']),

                            Section::make('روابط التواصل')
                                ->description('معلومات التواصل الاجتماعي')
                                ->icon(Heroicon::Link)
                                ->schema([
                                    TextInput::make('linkedin')
                                        ->label('لينكدن')
                                        ->url(),
                                    TextInput::make('instgram')
                                        ->label('انستغرام')
                                        ->url(),
                                    TextInput::make('githup')
                                        ->label('جيت هاب')
                                        ->url(),
                                    TextInput::make('whatsapp')
                                        ->label('واتساب')
                                        ->url(),
                                    TextInput::make('telegram')
                                        ->label('تيلغرام')
                                        ->url(),
                                ])
                                ->columns(1)
                                ->extraAttributes(['class' => 'bg-gray-50 dark:bg-gray-800 p-4 rounded-lg shadow-sm']),

                            Section::make('معلومات أخرى')
                                ->description('معلومات إضافية عن الموقع')
                                ->icon(Heroicon::InformationCircle)
                                ->schema([
                                    Tabs::make('Translations')
                                        ->tabs([
                                            Tabs\Tab::make('العربية')
                                                ->schema([
                                                    MarkdownEditor::make('description.ar')
                                                        ->label('الوصف بالعربية')
                                                        ->placeholder('اكتب تفاصيل عنك...'),
                                                ]),
                                            Tabs\Tab::make('English')
                                                ->schema([
                                                    MarkdownEditor::make('description.en')
                                                        ->label('Description in English')
                                                        ->placeholder('Write details about you...'),
                                                ]),
                                        ]),
                                    TextInput::make('email')
                                        ->email()
                                        ->label('البريد الإلكتروني'),
                                ])
                                ->columns(1)
                                ->extraAttributes(['class' => 'bg-gray-50 dark:bg-gray-800 p-4 rounded-lg shadow-sm']),
                        ]),
                ])
                    ->columnSpanFull(),
            ]);
    }
}
