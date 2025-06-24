<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'الخدمات';
    protected static ?string $pluralLabel = 'الخدمات';
    protected static ?string $label = 'خدمة';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('اسم الخدمة')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('الوصف')
                    ->rows(4)
                    ->nullable(),

                FileUpload::make('icon_service')
                    ->label('أيقونة الخدمة')
                    ->image()
                    ->preserveFilenames()
                    ->imagePreviewHeight('100')
                    ->required()
                ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('icon_service')
                    ->label('الأيقونة')
                    ->circular()
                    ->height(40),

                TextColumn::make('name')
                    ->label('الاسم')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('description')
                    ->label('الوصف')
                    ->limit(50),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
