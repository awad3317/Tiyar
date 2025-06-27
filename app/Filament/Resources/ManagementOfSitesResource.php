<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ManagementOfSitesResource\Pages;
use App\Filament\Resources\ManagementOfSitesResource\RelationManagers;
use App\Models\Management_of_sites;
use App\Models\ManagementOfSites;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ManagementOfSitesResource extends Resource
{
    protected static ?string $model = Management_Of_Sites::class;

    protected static ?string $navigationIcon = 'heroicon-o-server';
    protected static ?string $navigationLabel = 'إدارة المواقع';
    protected static ?string $modelLabel = 'موقع';
    protected static ?string $pluralModelLabel = 'المواقع';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('بيانات الموقع')
                    ->schema([
                        Forms\Components\Grid::make(2)->schema([

                            Forms\Components\Select::make('management_id')
                                ->label('الإدارة')
                                ->relationship('management', 'name')
                                ->searchable()
                                ->required(),

                            Forms\Components\TextInput::make('client_name')
                                ->label('اسم العميل')
                                ->maxLength(255),

                            Forms\Components\TextInput::make('domain')
                                ->label('النطاق (الدومين)')
                                ->maxLength(255)
                                ->placeholder('مثال: example.com'),


                            Forms\Components\TextInput::make('db_user')
                                ->label('DB User'),

                            Forms\Components\TextInput::make('db_username')
                                ->label('DB Username'),

                            Forms\Components\TextInput::make('db_name')
                                ->label('DB Name'),

                            Forms\Components\TextInput::make('db_password')
                                ->label('DB Password')
                                ->password(),

                            Forms\Components\TextInput::make('ssh')
                                ->label('SSH'),

                            Forms\Components\TextInput::make('server_password')
                                ->label('كلمة مرور الخادم')
                                ->password(),

                            Forms\Components\TextInput::make('site_user')
                                ->label('مستخدم الموقع'),

                        ]),

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
                Tables\Columns\TextColumn::make('management.name')
                    ->label('الإدارة')
                    ->searchable(),

                Tables\Columns\TextColumn::make('client_name')
                    ->label('اسم العميل')
                    ->searchable(),

                Tables\Columns\TextColumn::make('domain')
                    ->label('النطاق')
                    ->searchable(),

                Tables\Columns\TextColumn::make('db_user')
                    ->label('DB User'),

                Tables\Columns\TextColumn::make('db_username')
                    ->label('DB Username'),

                Tables\Columns\TextColumn::make('db_name')
                    ->label('DB Name'),

                Tables\Columns\TextColumn::make('ssh')
                    ->label('SSH'),

                Tables\Columns\TextColumn::make('site_user')
                    ->label('مستخدم الموقع'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإضافة')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                // أي فلاتر إضافية هنا
            ])
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
            'index' => Pages\ListManagementOfSites::route('/'),
            'create' => Pages\CreateManagementOfSites::route('/create'),
            'edit' => Pages\EditManagementOfSites::route('/{record}/edit'),
        ];
    }
}
