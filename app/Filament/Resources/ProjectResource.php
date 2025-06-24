<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(100)
                    ->label('عنوان المشروع'),
                TextInput::make('description')
                    ->required()
                    ->maxLength(100)
                    ->label('وصف المشروع'),
                Forms\Components\Select::make('type')
                    ->required()
                    ->label('نوع المشروع')
                    ->options([
                        'web' => 'موقع إلكتروني',
                        'app' => 'تطبيق',
                        'graphic' => 'تصميم',
                    ])
                    ->native(false) // شكل أجمل (قائمة منسدلة محسنة)
                    ->searchable(), // للبحث داخل القائمة إذا كبرت لاحقاً


        TextInput::make('link')
                    ->label('رابط المشروع (رابط خارجي)')
                    ->maxLength(255)
                    ->nullable()
                    ->hint('يمكن تركه فارغًا إذا تم رفع ملف PDF'),

                FileUpload::make('pdf_file')
                    ->label('ملف PDF للمشروع')
                    ->directory('projects-pdfs')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(20480) // 20MB
                    ->nullable()
                    ->helperText('يمكن رفع ملف PDF بدلاً من الرابط الخارجي'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('عنوان المشروع'),
                Tables\Columns\TextColumn::make('description')
                    ->label('وصف المشروع'),
                Tables\Columns\TextColumn::make('type')
                    ->label('نوع المشروع'),
                Tables\Columns\TextColumn::make('link')
                    ->label('رابط المشروع'),
            ])
            ->filters([
                //
            ])
            ->actions([
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
        return [
            //
        ];
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
