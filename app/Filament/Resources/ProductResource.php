<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Category Dropdown Relationship
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, $set) =>
                        $operation === 'create' ? $set('slug', Str::slug($state)) : null
                    ),

                TextInput::make('slug')
                    ->disabled()
                    ->dehydrated()
                    ->required()
                    ->unique(Product::class, 'slug', ignoreRecord: true),

                TextInput::make('price')
                    ->numeric()
                    ->required()
                    ->prefix('PKR'),

                TextInput::make('sale_price')
                    ->numeric()
                    ->prefix('PKR'),

                // Tags Dropdown
                Select::make('tag')
                    ->label('Product Tag / Event')
                    ->options([
                        'bridal' => 'Bridal',
                        'formal' => 'Formal',
                        'casual' => 'Casual',
                        'handbags' => 'Handbags',
                    ])
                    ->searchable()
                    ->placeholder('Select a tag for filtering'),

                Toggle::make('is_active')
                    ->label('Active Product (Home Page)')
                    ->default(true),

                // FileUpload with Auto WebP Conversion
                FileUpload::make('image')
                    ->label('Product Images (First image will be thumbnail)')
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->directory('products')
                    ->columnSpanFull()
                    ->saveUploadedFileUsing(function (TemporaryUploadedFile $file) {
                        $img = Image::make($file->getRealPath());
                        $filename = Str::random(40) . '.webp';
                        $path = 'products/' . $filename;
                        $encoded = $img->encode('webp', 80);
                        Storage::disk('public')->put($path, (string) $encoded);
                        return $path;
                    }),

                RichEditor::make('description')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('category.name')->sortable(),
                TextColumn::make('price')->money('PKR')->sortable(),
                IconColumn::make('is_featured')->boolean(),
                IconColumn::make('is_active')->boolean(),
                TextColumn::make('created_at')->dateTime(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}