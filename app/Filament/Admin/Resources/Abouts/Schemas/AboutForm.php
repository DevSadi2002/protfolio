<?php

namespace App\Filament\Admin\Resources\Abouts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class AboutForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema(components: [
                Section::make(heading: '🎓 معلومات التعليم / Educational Information')
                    ->description(description: '📚 أضف معلومات التعليم والشهادات الأكاديمية والإنجازات الأكاديمية')
                    ->icon(icon: 'heroicon-o-academic-cap')
                    ->collapsible()
                    ->collapsed(condition: false)
                    ->schema(components: [
                        Grid::make(2)
                            ->schema([
                                TextInput::make('degree.ar')
                                    ->label('🎓 الدرجة العلمية (عربي)')
                                    ->placeholder('مثال: بكالوريوس هندسة الحاسوب')
                                    ->helperText('أدخل الدرجة العلمية باللغة العربية')
                                    ->maxLength(255)
                                    ->required()
                                    ->markAsRequired(),

                                TextInput::make('degree.en')
                                    ->label('🎓 Degree (English)')
                                    ->placeholder('Ex: Bachelor of Computer Engineering')
                                    ->helperText('Enter the degree in English')
                                    ->maxLength(255)
                                    ->required()
                                    ->markAsRequired(),
                            ]),

                        Grid::make(3)
                            ->schema([
                                TextInput::make('institution.ar')
                                    ->label('🏢 المؤسسة التعليمية (عربي)')
                                    ->placeholder('مثال: جامعة دمشق')
                                    ->helperText('أدخل اسم الجامعة أو المؤسسة باللغة العربية')
                                    ->maxLength(255)
                                    ->required()
                                    ->markAsRequired(),

                                TextInput::make('institution.en')
                                    ->label('🏢 Institution (English)')
                                    ->placeholder('Ex: Damascus University')
                                    ->helperText('Enter the university or institution name in English')
                                    ->maxLength(255)
                                    ->required()
                                    ->markAsRequired(),
                            ]),

                        Textarea::make('achievements.ar')
                            ->label('🏆 الإنجازات الأكاديمية (عربي)')
                            ->placeholder('مثال:\n• حاصل على جائزة التفوق الأكاديمي\n• قائد فريق في مشروع تخرج\n• معدل عالي (3.8/4.0)')
                            ->helperText('✨ أضف إنجازاتك الأكاديمية، الجوائز، والمشاريع المميزة. استخدم نقاط للتنظيم')
                            ->rows(5)
                            ->columnSpanFull(),

                        Textarea::make('achievements.en')
                            ->label('🏆 Academic Achievements (English)')
                            ->placeholder('Example:\n• Received Academic Excellence Award\n• Team Leader in Graduation Project\n• High GPA (3.8/4.0)')
                            ->helperText('✨ Add your academic achievements, awards, and notable projects. Use bullet points for organization')
                            ->rows(5)
                            ->columnSpanFull(),
                    ]),

                Section::make('💼 الخبرات المهنية / Professional Experience')
                    ->description('🏢 أضف خبراتك المهنية والعملية، الشركات التي عملت بها والمشاريع التي نفذتها')
                    ->icon('heroicon-o-briefcase')
                    ->collapsible()
                    ->collapsed(false)
                    ->schema([
                        Repeater::make('experience')
                            ->relationship('experience')
                            ->label('💼 الخبرات / Experiences')
                            ->addActionLabel('🎆 إضافة خبرة جديدة / Add New Experience')
                            // ->deleteActionLabel('🗑️ حذف هذه الخبرة / Delete Experience')
                            ->itemLabel(fn(array $state): ?string => ($state['title'] ?? 'خبرة جديدة') . (isset($state['company']) ? ' @ ' . $state['company'] : ''))
                            ->collapsible()
                            ->collapsed()
                            ->cloneable()
                            ->reorderableWithButtons()
                            ->addable(true)
                            ->deletable(true)
                            ->schema([
                                TextInput::make('title')
                                    ->label('👨‍💻 المسمى الوظيفي / Job Title')
                                    ->placeholder('مثال: مطور ويب أول / Senior Web Developer')
                                    ->required()
                                    ->markAsRequired()
                                    ->columnSpanFull(),

                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('company')
                                            ->label('🏬 اسم الشركة / Company Name')
                                            ->placeholder('مثال: شركة التقنيات المتقدمة / Advanced Tech Solutions')
                                            ->required()
                                            ->markAsRequired(),

                                        TextInput::make('company_links')
                                            ->label('🔗 رابط الشركة / Company Link')
                                            ->placeholder('https://company-website.com')
                                            ->url()
                                            ->prefix('🌐')
                                            ->suffixIcon('heroicon-o-link')
                                            ->helperText('اختياري - اتركه فارغاً إذا لم يكن متاحاً'),
                                    ]),

                                Grid::make(3)
                                    ->schema([
                                        TextInput::make('location')
                                            ->label('الموقع / Location')
                                            ->placeholder('دمشق، سوريا / Damascus, Syria')
                                            ->prefix('📍'),

                                        DatePicker::make('start_date')
                                            ->label('تاريخ البداية / Start Date')
                                            ->required()
                                            ->displayFormat('Y')
                                            ->prefix('📅'),

                                        DatePicker::make('end_date')
                                            ->label('تاريخ النهاية / End Date')
                                            ->displayFormat('Y')
                                            ->prefix('📅')
                                            ->helperText('اتركه فارغاً إذا كانت الوظيفة الحالية / Leave empty if current job'),
                                    ]),

                                TextInput::make('description_title')
                                    ->label('عنوان الوصف / Description Title')
                                    ->placeholder('مثال: المهام والمسؤوليات / Tasks & Responsibilities')
                                    ->columnSpanFull(),

                                Textarea::make('description')
                                    ->label('وصف الخبرة / Experience Description')
                                    ->placeholder('اكتب وصفاً مفصلاً عن مهامك ومسؤولياتك وإنجازاتك...')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ])

                    ]),

                Section::make('🛠️ المهارات التقنية / Technical Skills')
                    ->description('⚡ أضف مهاراتك التقنية والبرمجية، لغات البرمجة، الأطر والمكتبات')
                    ->icon('heroicon-o-wrench-screwdriver')
                    ->collapsible()
                    ->collapsed(false)
                    ->schema([
                        Repeater::make('skills')
                            ->relationship('skills')
                            ->label('🛠️ المهارات / Skills')
                            ->addActionLabel('✨ إضافة مهارة جديدة / Add New Skill')
                            // ->deleteActionLabel('🗑️ حذف هذه المهارة / Delete Skill')
                            ->itemLabel(fn(array $state): ?string => $state['name'] ?? 'مهارة جديدة')
                            ->collapsible()
                            ->collapsed()
                            ->cloneable()
                            ->reorderableWithButtons()
                            ->addable(true)
                            ->deletable(true)
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('⚡ اسم المهارة / Skill Name')
                                            ->placeholder('مثال: Laravel, React.js, Python, JavaScript')
                                            ->required()
                                            ->markAsRequired()
                                            ->helperText('📝 أدخل اسم المهارة أو التقنية أو لغة البرمجة')
                                            ->suffixIcon('heroicon-o-code-bracket'),

                                        FileUpload::make('icon')
                                            ->label('🎨 أيقونة المهارة / Skill Icon')
                                            ->image()
                                            ->directory('skills-icons')
                                            ->imageEditor()
                                            ->imageCropAspectRatio('1:1')
                                            ->imageResizeTargetWidth(64)
                                            ->imageResizeTargetHeight(64)
                                            ->helperText('🖼️ حمل أيقونة للمهارة (64x64 px مفضل) - اختياري')
                                            ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/svg+xml'])
                                            ->maxSize(1024)
                                            ->hintIcon('heroicon-o-information-circle')
                                            ->hint('يفضل استخدام SVG لجودة أفضل'), // 1MB
                                    ]),
                            ])

                    ]),

                Section::make('💭 البيانات والعبارات المهمة / Key Statements')
                    ->description('✨ أضف البيانات والعبارات المهمة عنك، رؤيتك وأهدافك ومبادئك')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->collapsible()
                    ->collapsed(false)
                    ->schema([
                        Repeater::make('statements')
                            ->relationship('statements')
                            ->label('💭 البيانات / Statements')
                            ->addActionLabel('💫 إضافة بيان جديد / Add New Statement')
                            // ->deleteActionLabel('🗑️ حذف هذا البيان / Delete Statement')
                            ->itemLabel(fn(array $state): ?string => $state['key']['ar'] ?? $state['key']['en'] ?? 'بيان جديد')
                            ->collapsible()
                            ->collapsed()
                            ->cloneable()
                            ->reorderableWithButtons()
                            ->addable(true)
                            ->deletable(true)
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('key.ar')
                                            ->label('🔑 المفتاح (عربي) / Key (Arabic)')
                                            ->placeholder('مثال: الرؤية، الهدف، المبدأ، الشغف')
                                            ->required()
                                            ->markAsRequired()
                                            ->helperText('🎨 أدخل عنوان قصير ومعبر للبيان')
                                            ->suffixIcon('heroicon-o-key'),

                                        TextInput::make('key.en')
                                            ->label('🔑 المفتاح (إنجليزي) / Key (English)')
                                            ->placeholder('Ex: Vision, Goal, Principle, Passion')
                                            ->required()
                                            ->markAsRequired()
                                            ->helperText('🎨 Enter a short and meaningful title for the statement')
                                            ->suffixIcon('heroicon-o-key'),
                                    ]),

                                Textarea::make('value.ar')
                                    ->label('📜 القيمة (عربي) / Value (Arabic)')
                                    ->placeholder('مثال:\nأسعى إلى تطوير حلول تقنية مبتكرة تحسن من حياة الناس وتحقق أهداف الشركات بكفاءة عالية.')
                                    ->required()
                                    ->markAsRequired()
                                    ->rows(4)
                                    ->helperText('✨ اكتب نصاً معبراً وملهماً يعكس شخصيتك وقيمك')
                                    ->columnSpanFull(),

                                Textarea::make('value.en')
                                    ->label('📜 القيمة (إنجليزي) / Value (English)')
                                    ->placeholder('Example:\nI strive to develop innovative technical solutions that improve people\'s lives and achieve business objectives with high efficiency.')
                                    ->required()
                                    ->markAsRequired()
                                    ->rows(4)
                                    ->helperText('✨ Write an expressive and inspiring text that reflects your personality and values')
                                    ->columnSpanFull(),
                            ])

                    ]),
            ]);
    }
}
