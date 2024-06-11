<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RedirectionResource\Pages;
use App\Filament\Resources\RedirectionResource\RelationManagers;
use App\Models\Redirection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RedirectionResource extends Resource
{
    protected static ?string $model = Redirection::class;

    protected ?string $maxContentWidth = 'full';
    protected static ?string $navigationLabel = "Redirecionamentos";

    protected static ?string $navigationIcon = 'heroicon-o-arrows-right-left';

    protected static ?string $navigationGroup = 'Cadastro Produtos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('old_url'),
                Forms\Components\TextInput::make('new_url'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('old_url'),
                Tables\Columns\TextColumn::make('new_url')
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
            'index' => Pages\ListRedirections::route('/'),
            'create' => Pages\CreateRedirection::route('/create'),
            'edit' => Pages\EditRedirection::route('/{record}/edit'),
        ];
    }
}
