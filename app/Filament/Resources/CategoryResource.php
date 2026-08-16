<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

   public static function form(Form $form): Form
{
    return $form
        ->schema([
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
                ->unique(Category::class, 'slug', ignoreRecord: true),

            TextInput::make('order')
                ->numeric()
                ->default(0)
                ->label('Display Order')
                ->helperText('Chota number pehle show hoga (0, 1, 2...)'),

            FileUpload::make('image')
                ->label('Category Image')
                ->image()
                ->directory('categories')
                ->columnSpanFull()
                ->saveUploadedFileUsing(function (TemporaryUploadedFile $file) {
                    // 1. Temporary file read karein
                    $img = Image::make($file->getRealPath());

                    // 2. WebP filename aur path setup
                    $filename = Str::random(40) . '.webp';
                    $path = 'categories/' . $filename;

                    // 3. WebP format mein encode karein (80% quality)
                    $encoded = $img->encode('webp', 80);

                    // 4. Public storage disk par save karein
                    Storage::disk('public')->put($path, (string) $encoded);

                    // 5. Database Column ke liye relative path return karein
                    return $path;
                }),
        ]);
}

   public static function table(Table $table): Table
{
    return $table
        ->columns([
            ImageColumn::make('image'),
            TextColumn::make('name')->searchable(),
            TextColumn::make('slug'),
            TextColumn::make('order')->sortable(),
            TextColumn::make('created_at')->dateTime()->sortable(),
        ])
        ->defaultSort('order', 'asc')
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}