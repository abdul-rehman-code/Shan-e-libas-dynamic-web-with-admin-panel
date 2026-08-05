<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
           ->schema([
            TextInput::make('customer_name'),
            TextInput::make('customer_email'),
            TextInput::make('customer_phone'),
            TextInput::make('total_amount')->prefix('PKR'),
            Textarea::make('shipping_address')->columnSpanFull(),

            Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'processing' => 'Processing',
                    'shipped' => 'Shipped',
                    'delivered' => 'Delivered',
                    'cancelled' => 'Cancelled',
                ])->required(),

                FileUpload::make('payment_screenshot')
                ->label('Payment Screenshot / Receipt')
                ->image()
                ->disk('public') 
                ->disabled()    
                ->openable()     
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
      return $table
    ->columns([
        TextColumn::make('id')->label('Order ID')->sortable(),
        TextColumn::make('customer_name')->searchable(),
        TextColumn::make('customer_phone')->label('Phone')->searchable(),
        TextColumn::make('shipping_address')->label('Address')->limit(20),
  TextColumn::make('items_list')
    ->label('Items')
    ->badge()
    ->state(function ($record) {
        return $record->items->map(function ($item) {
            $productName = $item->product?->name ?? 'Item';
            return "{$productName} x{$item->quantity}";
        })->implode(', ');
    })
    ->listWithLineBreaks(),
        ImageColumn::make('payment_screenshot')
                                            ->label('Screenshot')
                                            ->square()
                                            ->openUrlInNewTab()
                                            ->disk('public'),

        TextColumn::make('total_amount')->money('PKR')->sortable(),

        SelectColumn::make('status')
            ->options([
                'pending' => 'Pending',
                'processing' => 'Processing',
                'shipped' => 'Shipped',
                'delivered' => 'Delivered',
                'cancelled' => 'Cancelled',
            ]),

        TextColumn::make('created_at')->dateTime()->sortable(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
