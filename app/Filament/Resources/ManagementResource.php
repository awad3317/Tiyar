<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ManagementResource\Pages;
use App\Models\Management;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ManagementResource extends Resource
{
    protected static ?string $model = Management::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'الإدارة';
    protected static ?string $modelLabel = 'مدير';
    protected static ?string $pluralModelLabel = 'الإدارة';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Tabs::make('تفاصيل المدير')
                ->tabs([
                    Forms\Components\Tabs\Tab::make('الأساسية')
                        ->icon('heroicon-o-identification')
                        ->schema([
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

                            Forms\Components\TextInput::make('position')
                                ->label('الوظيفة')
                                ->maxLength(255),

                            Forms\Components\Select::make('role')
                                ->label('الصلاحية')
                                ->options([
                                    'admin' => 'مشرف',
                                    'manager' => 'مدير',
                                    'staff' => 'موظف',
                                ])
                                ->required()
                                ->native(false),
                        ]),

                    Forms\Components\Tabs\Tab::make('الوصول')
                        ->icon('heroicon-o-lock-closed')
                        ->schema([
                            Forms\Components\TextInput::make('ssh')
                                ->label('SSH')
                                ->maxLength(255),

                            Forms\Components\TextInput::make('password')
                                ->label('كلمة المرور')
                                ->password()
                                ->dehydrateStateUsing(fn($state) => $state ? bcrypt($state) : null)
                                ->maxLength(255)
                                ->helperText('اترك الحقل فارغاً إذا لم ترغب في تغييره'),
                        ]),

                    Forms\Components\Tabs\Tab::make('تفاصيل إضافية')
                        ->icon('heroicon-o-information-circle')
                        ->schema([
                            Forms\Components\Textarea::make('skills')
                                ->label('المهارات'),

                            Forms\Components\Textarea::make('notes')
                                ->label('ملاحظات'),
                        ]),
                ])
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('الاسم')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-user'),

                Tables\Columns\TextColumn::make('email')->label('البريد الإلكتروني'),
                Tables\Columns\TextColumn::make('phone')->label('رقم الهاتف'),
                Tables\Columns\TextColumn::make('position')->label('الوظيفة'),

                Tables\Columns\BadgeColumn::make('role')
                    ->label('الصلاحية')
                    ->colors([
                        'admin' => 'danger',
                        'manager' => 'warning',
                        'staff' => 'success',
                    ])
                    ->formatStateUsing(fn ($state) => match($state) {
                        'admin' => 'مشرف',
                        'manager' => 'مدير',
                        'staff' => 'موظف',
                        default => 'غير محدد',
                    }),

                Tables\Columns\TextColumn::make('ssh')->label('SSH'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإضافة')
                    ->dateTime()
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
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListManagement::route('/'),
            'create' => Pages\CreateManagement::route('/create'),
            'edit' => Pages\EditManagement::route('/{record}/edit'),
        ];
    }
}
