<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkillResource\Pages;
use App\Filament\Resources\SkillResource\RelationManagers;
use App\Models\Skill;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SkillResource extends Resource
{
    protected static ?string $model = Skill::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationGroup = 'Profil';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
            ->label('Skill Name')
            ->placeholder('Contoh: HTML5, JavaScript')
            ->required()
            ->maxLength(255),

        TextInput::make('level')
            ->label('Skill Level (%)')
            ->type('number')
            ->suffix('%')
            ->placeholder('Contoh: 90')
            ->minValue(0)
            ->maxValue(100)
            ->required(),

        TextInput::make('category')
            ->label('Kategori')
            ->placeholder('Contoh: Frontend, Backend, UI/UX')
            ->required()
            ->maxLength(100),

        TextInput::make('icon')
            ->label('BoxIcons Icon Class')
            ->placeholder('Contoh: bxl-html5')
            ->hint('Cari icon di https://boxicons.com dan salin nama class-nya, misal: bxl-javascript')
            ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('level'),
                TextColumn::make('category'),
                TextColumn::make('icon'),
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
            'index' => Pages\ListSkills::route('/'),
            'create' => Pages\CreateSkill::route('/create'),
            'edit' => Pages\EditSkill::route('/{record}/edit'),
        ];
    }
}
