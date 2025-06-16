<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use App\Models\Service;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';
    protected static ?string $navigationLabel = 'الطلبات ';
    protected static ?string $modelLabel = 'طلب ';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('customer_name')
                    ->label('اسم العميل')
                    ->required(),

                TextInput::make('customer_phone')
                    ->label('رقم الهاتف')
                    ->tel()
                    ->required(),

                Textarea::make('notes')
                    ->label('وصف المشروع')
                    ->rows(4),

                Select::make('service_id')
                    ->label('الخدمة')
                    ->relationship('service', 'name')
                    ->searchable()
                    ->required()
                    ->live(),

                Select::make('project_id')
                    ->label('المشروع (اختياري)')
                    ->relationship('project', 'title')
                    ->searchable()
                    ->live(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('customer_name')->label('اسم العميل')->searchable(),
                TextColumn::make('customer_phone')->label('رقم الهاتف'),
                TextColumn::make('service.name')->label('الخدمة'),
                TextColumn::make('project.title')->label('المشروع')->default('-'),
                TextColumn::make('created_at')->label('تاريخ الطلب')->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
