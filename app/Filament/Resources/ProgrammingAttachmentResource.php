<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgrammingAttachmentResource\Pages;
use App\Filament\Resources\ProgrammingAttachmentResource\RelationManagers;
use App\Models\AttachmentProgramming;
use App\Models\Programming;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProgrammingAttachmentResource extends Resource
{
    protected static ?string $model = AttachmentProgramming::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

    protected static ?string $navigationLabel = "Arquivos Protocolos";

    protected static ?string $navigationGroup = 'Cadastro Protocolos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('file')
                    ->directory('equipments')
                    ->acceptedFileTypes(['application/pdf'])
                    ->preserveFilenames(),
                DatePicker::make('expiration_date')->required(),
                Select::make('programming_id')
                ->relationship('programming', 'name')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('file'),
                Tables\Columns\TextColumn::make('expiration_date'),
                Tables\Columns\TextColumn::make('programming.name'),
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
            'index' => Pages\ListProgrammingAttachments::route('/'),
            'create' => Pages\CreateProgrammingAttachment::route('/create'),
            'edit' => Pages\EditProgrammingAttachment::route('/{record}/edit'),
        ];
    }
}
