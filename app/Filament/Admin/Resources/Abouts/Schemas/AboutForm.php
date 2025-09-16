<?php

namespace App\Filament\Admin\Resources\Abouts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class AboutForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('التعليم')
                    ->description('أضف تفاصيل تعليمك الأكاديمي، بما في ذلك الدرجة العلمية، المؤسسة التعليمية، وأبرز الإنجازات أو المهارات المكتسبة خلال دراستك.')
                    ->icon(Heroicon::OutlinedBriefcase)
                    ->schema([
                        TextInput::make('degree')
                            ->label('المؤهل العلمي')
                            ->placeholder('مثال: بكالوريوس علوم حاسوب')
                            ->required()
                            ->helperText('حدد الدرجة العلمية التي حصلت عليها.'),

                        TextInput::make('institution')
                            ->label('المؤسسة التعليمية')
                            ->placeholder('مثال: جامعة الأقصى')
                            ->required()
                            ->helperText('مكان الدراسة أو الجامعة.'),

                        TagsInput::make('achievements')
                            ->label('المهارات والإنجازات')
                            ->placeholder('أضف المهارات المكتسبة هنا')
                            ->separator(',')
                            ->suggestions(['Laravel', 'Livewire', 'Tailwind', 'Vue', 'React'])
                            ->helperText('يمكنك إدراج المهارات أو الإنجازات التي اكتسبتها خلال دراستك.')
                            ->nullable(),
                    ])
                    ->columnSpanFull(),

                // مثال لتكرار نفس الأسلوب لأقسام أخرى مثل الخبرة العملية
                Section::make('الخبرة العملية')
                    ->description('أضف خبراتك العملية، الشركات التي عملت بها، المناصب التي شغلتها، والمهارات المكتسبة.')
                    ->icon(Heroicon::OutlinedBriefcase)
                    ->schema([
                        Repeater::make(name: 'experience')
                            ->relationship()
                            ->label('الخبرة العملية')
                            ->schema([
                                TextInput::make('title')
                                    ->label('المسمى الوظيفي')
                                    ->placeholder('مثال: مطور ويب')
                                    ->required(),

                                TextInput::make('company')
                                    ->label('اسم الشركة')
                                    ->placeholder('مثال: شركة التقنية الحديثة')
                                    ->required(),

                                TextInput::make('location')
                                    ->label('الموقع')
                                    ->placeholder('مثال: غزة، فلسطين')
                                    ->nullable(),

                                TextInput::make('start_date')
                                    ->numeric()
                                    ->label('تاريخ البدء')
                                    ->required(),

                                TextInput::make('end_date')
                                    ->label('تاريخ الانتهاء')
                                    ->nullable()
                                    ->numeric()
                                    ->helperText('اتركه فارغاً إذا كنت تعمل حالياً في هذه الوظيفة.'),

                                MarkdownEditor::make('description')
                                    ->label('وصف العمل')
                                    ->placeholder('صف مسؤولياتك ومهامك في هذه الوظيفة.')
                                    ->columnSpanFull(),

                            ])
                    ])
                    ->columnSpanFull(),
                Section::make('بطاقات التعريف')
                    ->description('أضف معلومات تعريفية عن نفسك مثل الاسم، الألقاب، الضمائر، أو أي بيانات قصيرة ترغب بعرضها.')
                    ->icon(Heroicon::OutlinedIdentification)
                    ->schema([
                        Repeater::make('statements')
                            ->relationship() // يربط مع دالة statements() في الـ Model
                            ->label('بطاقة تعريف')
                            ->schema([
                                TextInput::make('key')
                                    ->label('نوع المعلومات')
                                    ->placeholder('مثال: الاسم، الضمائر، الوظيفة')
                                    ->required()
                                    ->helperText('حدد نوع المعلومات أو العنوان الذي ستعرضه.'),

                                TextInput::make('value')
                                    ->label('القيمة')
                                    ->placeholder('مثال: Saadi Saadi، she/her، مطور ويب')
                                    ->required()
                                    ->helperText('ضع القيمة المناسبة للنوع المختار.'),
                            ])
                            ->columns(2)
                            ->createItemButtonLabel('أضف بطاقة جديدة')
                            ->collapsible(),
                    ])
                    ->columnSpanFull(),


                // Section للمهارات باستخدام Repeater
                Section::make('المهارات التقنية')
                    ->description('أضف المهارات التقنية التي تتقنها، مع أيقونة مميزة لكل مهارة.')
                    ->icon(Heroicon::OutlinedCodeBracket)
                    ->schema([
                        Repeater::make('skills')
                            ->relationship() // يربط مع دالة skills() في الـ Model
                            ->label('المهارات')
                            ->schema([
                                TextInput::make('name')
                                    ->label('اسم المهارة')
                                    ->placeholder('مثال: Git أو Laravel')
                                    ->required(),

                                FileUpload::make('icon')
                                    ->label('أيقونة المهارة')
                                    ->image()
                                    ->disk('public')
                                    ->directory('skills') // حفظ الصور في storage/app/public/skills
                                    ->required()
                                    ->downloadable()
                                    ->imagePreviewHeight('50')
                                    ->helperText('اختر صورة صغيرة تمثل المهارة.'),
                            ])
                            ->columns(2)
                            ->createItemButtonLabel('أضف مهارة جديدة')
                            ->collapsible(), // يمكن طي كل عنصر
                    ])
                    ->columnSpanFull()

            ]);
    }
}
