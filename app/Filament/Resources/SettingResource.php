<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('bank_name')
                    ->label('Bank Name')
                    ->placeholder('JazzCash / EasyPaisa / Meezan Bank')
                    ->required(),
                Forms\Components\TextInput::make('account_number')
                    ->label('Account / Phone Number')
                    ->placeholder('03090386227')
                    ->required(),

                Forms\Components\TextInput::make('account_name')
                    ->label('Account Holder Name')
                    ->placeholder('Shan-E-Libas')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                 Tables\Columns\TextColumn::make('bank_name')->label('Bank Name'),
                Tables\Columns\TextColumn::make('account_number')->label('Account Number'),
                Tables\Columns\TextColumn::make('account_name')->label('Account Name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}