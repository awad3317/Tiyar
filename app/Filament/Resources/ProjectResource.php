<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-code-bracket-square';
    protected static ?string $navigationLabel = 'المشاريع';
    protected static ?string $modelLabel = 'مشروع';
    protected static ?string $pluralModelLabel = 'المشاريع';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('بيانات المشروع الأساسية')
                ->description('أدخل التفاصيل العامة للمشروع')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('title')
                            ->label('عنوان المشروع')
                            ->required()
                            ->maxLength(100),

                        Forms\Components\Select::make('type')
                            ->label('نوع المشروع')
                            ->options([
                                'web' => 'موقع إلكتروني',
                                'app' => 'تطبيق',
                                'graphic' => 'تصميم',
                            ])
                            ->native(false)
                            ->searchable()
                            ->required(),
                    ]),

                    Forms\Components\Textarea::make('description')
                        ->label('وصف المشروع')
                        ->columnSpanFull(),
                ]),

            Section::make('الربط والملف')
                ->columns(2)
                ->schema([
                    TextInput::make('link')
                        ->label('رابط المشروع')
                        ->placeholder('مثال: https://example.com')
                        ->maxLength(255),

                    FileUpload::make('pdf_file')
                        ->label('ملف PDF')
                        ->directory('projects-pdfs')
                        ->acceptedFileTypes(['application/pdf'])
                        ->nullable()
                        ->helperText('ارفع ملف المشروع بدلاً من الرابط (اختياري)'),
                ]),

            Section::make('الموظفين والخدمة')
                ->columns(2)
                ->schema([
                    Forms\Components\Select::make('service_id')
                        ->label('الخدمة المرتبطة')
                        ->relationship('service', 'name')
                        ->searchable()
                        ->required(),

                    MultiSelect::make('developers')
                        ->label('المبرمجون')
                        ->relationship('developers', 'name')
                        ->searchable()
                        ->required(),
                ]),

            Section::make('التواريخ والتكاليف')
                ->columns(2)
                ->schema([
                    Forms\Components\DatePicker::make('start_date')
                        ->label('تاريخ البداية'),

                    Forms\Components\DatePicker::make('delivery_date')
                        ->label('تاريخ التسليم'),

                    TextInput::make('price')
                        ->label('سعر العميل')
                        ->numeric()
                        ->required(),

                    TextInput::make('price_for_company')
                        ->label('سعر الشركة')
                        ->numeric()
                        ->required(),
                ]),

            Section::make('الحالة')
                ->schema([
                    Forms\Components\Select::make('status')
                        ->label('حالة المشروع')
                        ->options([
                            'in_progress' => 'قيد التنفيذ',
                            'completed' => 'مكتمل',
                            'delivered' => 'تم التسليم',
                        ])
                        ->native(false)
                        ->required(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('title')
                ->label('العنوان')
                ->searchable()
                ->sortable(),

            TextColumn::make('type')
                ->label('النوع')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'web' => 'info',
                    'app' => 'success',
                    'graphic' => 'warning',
                    default => 'gray',
                }),

            TextColumn::make('service.name')
                ->label('الخدمة'),

            TextColumn::make('developers.name')
                ->label('المبرمجون')
                ->badge()
                ->limit(3)
                ->tooltip('عرض أسماء المبرمجين المرتبطين'),

            TextColumn::make('start_date')
                ->label('البداية')
                ->date(),

            TextColumn::make('delivery_date')
                ->label('التسليم')
                ->date(),

            TextColumn::make('price')
                ->label('سعر العميل')
                ->money('USD'),

            TextColumn::make('price_for_company')
                ->label('للشركة')
                ->money('USD'),

            BadgeColumn::make('status')
                ->label('الحالة')
                ->colors([
                    'in_progress' => 'warning',
                    'completed' => 'success',
                    'delivered' => 'primary',
                ])
                ->formatStateUsing(fn($state) => match($state) {
                    'in_progress' => 'قيد التنفيذ',
                    'completed' => 'مكتمل',
                    'delivered' => 'تم التسليم',
                    default => $state,
                }),
        ])
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
