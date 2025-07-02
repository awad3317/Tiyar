<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeveloperResource\Pages;
use App\Models\Developer;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DeveloperResource extends Resource
{
    protected static ?string $model = Developer::class;

    protected static ?string $navigationIcon = 'heroicon-o-command-line';
    protected static ?string $navigationLabel = 'المبرمجون';
    protected static ?string $modelLabel = 'مبرمج';
    protected static ?string $pluralModelLabel = 'المبرمجون';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('بيانات المبرمج')
                    ->description('املأ بيانات المبرمج بدقة')
                    ->schema([
                        Grid::make(2)->schema([
                            Forms\Components\TextInput::make('name')
                                ->label('الاسم')
                                ->required()
                                ->maxLength(255),

                            Forms\Components\TextInput::make('email')
                                ->label('البريد الإلكتروني')
                                ->email()
                                ->maxLength(255),

                            Forms\Components\TextInput::make('phone')
                                ->label('رقم الهاتف')
                                ->maxLength(255),

                            Forms\Components\Select::make('position')
                                ->label('الوظيفة')
                                ->options([
                                    'frontend' => 'مطور واجهات أمامية',
                                    'backend' => 'مطور خلفيات',
                                    'fullstack' => 'مطور متكامل',
                                    'mobile' => 'مطور تطبيقات موبايل',
                                    'devops' => 'مهندس DevOps',
                                    'uiux' => 'مصمم UI/UX',
                                    'qa' => 'مهندس جودة',
                                    'gr' => 'مصمم جرافيك',
                                ])
                                ->required()
                                ->native(false),
                        ]),

                        Forms\Components\Select::make('evaluation')
                            ->label('التقييم')
                            ->options([
                                '1' => '⭐',
                                '2' => '⭐⭐',
                                '3' => '⭐⭐⭐',
                                '4' => '⭐⭐⭐⭐',
                                '5' => '⭐⭐⭐⭐⭐',
                            ])
                            ->required()
                            ->native(false),

                        Forms\Components\Textarea::make('skills')
                            ->label('المهارات')
                            ->rows(4),

                        Forms\Components\Textarea::make('notes')
                            ->label('ملاحظات')
                            ->rows(3),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('الاسم')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('البريد الإلكتروني')
                    ->copyable(),

                TextColumn::make('phone')
                    ->label('الهاتف'),

                BadgeColumn::make('position')
                    ->label('الوظيفة')
                    ->colors([
                        'frontend' => 'info',
                        'backend' => 'primary',
                        'fullstack' => 'success',
                        'mobile' => 'warning',
                        'devops' => 'gray',
                        'uiux' => 'pink',
                        'qa' => 'yellow',
                        'gr' => 'purple',
                    ]),

                TextColumn::make('evaluation')
                    ->label('التقييم')
                    ->formatStateUsing(fn($state) => str_repeat('⭐', intval($state)))
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('أضيف بتاريخ')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
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
            'index' => Pages\ListDevelopers::route('/'),
            'create' => Pages\CreateDeveloper::route('/create'),
            'edit' => Pages\EditDeveloper::route('/{record}/edit'),
        ];
    }
}
