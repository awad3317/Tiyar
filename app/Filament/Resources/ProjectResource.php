<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';
    protected static ?string $model = Project::class;
    protected static ?string $navigationLabel = 'المشاريع';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('title')->label('عنوان المشروع')->required(),
                TextInput::make('link')->label('رابط المشروع')->url()->required(),
                Forms\Components\Select::make('type')
                    ->label('نوع الخدمة')
                    ->required()
                    ->options([
                        'web' => 'تصميم مواقع ويب',
                        'app' => 'تطبيقات موبايل',
                        'graphic' => 'تصميم جرافيك',
                    ])
                    ->searchable()
                    ->live()
                    ->preload(),
                Textarea::make('description')->label('الوصف')->rows(3)
                ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('العنوان'),
                TextColumn::make('link')->label('رابط')->limit(30),
                TextColumn::make('created_at')->label('تاريخ الإضافة')->date(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
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
