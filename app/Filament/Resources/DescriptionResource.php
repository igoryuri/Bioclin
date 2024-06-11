<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DescriptionResource\Pages;
use App\Filament\Resources\DescriptionResource\RelationManagers;
use App\Models\Description;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mvenghaus\FilamentPluginTranslatableInline\Forms\Components\TranslatableContainer;

class DescriptionResource extends Resource
{
    protected static ?string $model = Description::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    protected static ?string $navigationLabel = "Descrição";

    protected static ?string $navigationGroup = 'Cadastro Produtos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_id')
                    ->relationship('product', 'name')
                    ->searchable()
                    ->required(),
                TranslatableContainer::make(
                    Forms\Components\TextInput::make('name')->required(),
                ),
                TranslatableContainer::make(
                    Forms\Components\RichEditor::make('description')->required(),
                ),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product.name'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description'),
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
            'index' => Pages\ListDescriptions::route('/'),
            'create' => Pages\CreateDescription::route('/create'),
            'edit' => Pages\EditDescription::route('/{record}/edit'),
        ];
    }
}
