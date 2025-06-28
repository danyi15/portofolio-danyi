<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Filament\Resources\GalleryResource\RelationManagers;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
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

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Portofolio';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
             Select::make('gallery_category_id')
            ->relationship('gallerycategory', 'name')
            ->label('Category')
            ->required(),

            TextInput::make('title')
                ->required()
                ->maxLength(255),

            FileUpload::make('image_path')
                ->label('Image')
                ->image()
                ->directory('galleries/images'),

            FileUpload::make('video_path')
                ->label('Video File')
                ->directory('galleries/videos')
                ->acceptedFileTypes(['video/mp4']),

            Textarea::make('description')
                ->rows(4)
                ->nullable(),

                TextInput::make('video_url')
                ->label('Video URL')
                ->url()
                ->nullable(),


            FileUpload::make('cover_image')
                ->label('Cover Image')
                ->image()
                ->directory('galleries/covers'),

            FileUpload::make('thumbnail')
                ->label('Thumbnail')
                ->image()
                ->directory('galleries/thumbnails'),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('gallerycategory.name')->label('Category'),
                ImageColumn::make('cover_image')->label('Cover')->square(),
                ImageColumn::make('thumbnail')->label('Thumb')->square(),
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
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
