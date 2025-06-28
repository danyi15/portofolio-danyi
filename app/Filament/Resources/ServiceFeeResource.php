<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceFeeResource\Pages;
use App\Filament\Resources\ServiceFeeResource\RelationManagers;
use App\Models\ServiceFee;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceFeeResource extends Resource
{
    protected static ?string $model = ServiceFee::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationGroup = 'Profil';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                ->required()
                ->maxLength(255),
                Textarea::make('description')
                ->rows(3),
                TextInput::make('type')
                ->maxLength(100),
                FileUpload::make('icon')
                ->image()
                ->required(),
                TextInput::make('fee')->numeric()
                ->prefix('Rp')
                ->required(),
                FileUpload::make('thumbnail')
                ->image()
                ->directory('services/thumbnails')
                ->nullable(),
                Toggle::make('is_available')
                ->label('Available')
                ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('type'),
                ImageColumn::make('icon')->label('Icon'),
                TextColumn::make('fee')->money('IDR', true),
                ToggleColumn::make('is_available'),
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
            'index' => Pages\ListServiceFees::route('/'),
            'create' => Pages\CreateServiceFee::route('/create'),
            'edit' => Pages\EditServiceFee::route('/{record}/edit'),
        ];
    }
}
