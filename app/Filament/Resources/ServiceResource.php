<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'الخدمات';
    protected static ?string $modelLabel = 'خدمة';
    protected static ?string $pluralModelLabel = 'الخدمات';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make([
                TextInput::make('name')
                    ->label('اسم الخدمة')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('الوصف')
                    ->rows(3)
                    ->placeholder('اكتب وصفًا مختصرًا عن الخدمة...')
                    ->hint('الوصف يظهر داخل الجدول ويمكن تركه فارغاً'),

                FileUpload::make('icon_service')
                    ->label('أيقونة الخدمة')
                    ->image()
                    ->imageEditor()
                    ->preserveFilenames()
                    ->imagePreviewHeight('100')
                    ->required()
                    ->columnSpanFull()
                    ->helperText('يفضّل أن تكون الصورة مربعة 1:1'),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            ImageColumn::make('icon_service')
                ->label('الأيقونة')
                ->circular()
                ->height(50)
                ->tooltip('أيقونة الخدمة'),

            TextColumn::make('name')
                ->label('الاسم')
                ->sortable()
                ->searchable()
                ->icon('heroicon-o-hashtag')
                ->color('primary'),

            TextColumn::make('description')
                ->label('الوصف')
                ->badge()
                ->color('gray')
                ->limit(40)
                ->placeholder('لا يوجد وصف'),
        ])
            ->defaultSort('name')
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
