<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TypeAttachmentResource\Pages;
use App\Filament\Resources\TypeAttachmentResource\RelationManagers;
use App\Models\TypeAttachment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TypeAttachmentResource extends Resource
{
    protected static ?string $model = TypeAttachment::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';

    protected static ?string $navigationLabel = "Tipo de Anexo";

    protected static ?string $navigationGroup = 'Cadastro Produtos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Forms\Components\TextInput::make('name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
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
            'index' => Pages\ListTypeAttachments::route('/'),
            'create' => Pages\CreateTypeAttachment::route('/create'),
            'edit' => Pages\EditTypeAttachment::route('/{record}/edit'),
        ];
    }
}
