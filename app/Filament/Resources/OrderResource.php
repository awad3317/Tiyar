<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationLabel = 'الطلبات';
    protected static ?string $modelLabel = 'طلب';
    protected static ?string $pluralModelLabel = 'الطلبات';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Tabs::make('تفاصيل الطلب')
                ->tabs([
                    Forms\Components\Tabs\Tab::make('العميل')
                        ->icon('heroicon-o-user')
                        ->schema([
                            Forms\Components\TextInput::make('customer_name')
                                ->label('اسم العميل')
                                ->required()
                                ->maxLength(255),

                            Forms\Components\TextInput::make('customer_phone')
                                ->label('رقم العميل')
                                ->tel()
                                ->maxLength(20),
                        ]),

                    Forms\Components\Tabs\Tab::make('الخدمة')
                        ->icon('heroicon-o-cog')
                        ->schema([
                            Forms\Components\Select::make('service_id')
                                ->label('الخدمة المطلوبة')
                                ->relationship('service', 'name')
                                ->required()
                                ->searchable()
                                ->native(false),
                        ]),

                    Forms\Components\Tabs\Tab::make('ملاحظات')
                        ->icon('heroicon-o-chat-bubble-left-right')
                        ->schema([
                            Forms\Components\Textarea::make('notes')
                                ->label('ملاحظات العميل')
                                ->maxLength(1000),
                        ]),
                ])
                ->columnSpanFull()
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('customer_name')
                ->label('اسم العميل')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('customer_phone')
                ->label('رقم العميل')
                ->searchable(),

            Tables\Columns\TextColumn::make('service.name')
                ->label('الخدمة المطلوبة')
                ->sortable()
                ->badge()
                ->color('primary'),

            Tables\Columns\TextColumn::make('notes')
                ->label('ملاحظات')
                ->limit(30)
                ->tooltip(fn ($record) => $record->notes),
        ])
            ->filters([
                // يمكنك إضافة فلاتر هنا مثل: الخدمة، العميل، التاريخ
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
