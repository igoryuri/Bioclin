<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttachmentResource\Pages;
use App\Filament\Resources\AttachmentResource\RelationManagers;
use App\Models\Attachment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AttachmentResource extends Resource
{
    protected static ?string $model = Attachment::class;

    protected static ?string $navigationIcon = 'heroicon-o-paper-clip';

    protected static ?string $navigationLabel = "Anexos";

    protected static ?string $navigationGroup = 'Cadastro Produtos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_id')
                ->relationship('product', 'name'),
                Forms\Components\Select::make('type_attachment_id')
                ->relationship('type_attachment', 'name'),
                Forms\Components\TextInput::make('name'),
                Forms\Components\TextInput::make('register'),
                Forms\Components\DatePicker::make('expiration_date'),
                Forms\Components\FileUpload::make('file')
                    ->directory('attachments')
                    ->preserveFilenames()
                    ->acceptedFileTypes(['application/pdf']),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product.name'),
                Tables\Columns\TextColumn::make('type_attachment.name'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('register'),
                Tables\Columns\TextColumn::make('expiration_date'),
                Tables\Columns\ImageColumn::make('file'),
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
            'index' => Pages\ListAttachments::route('/'),
            'create' => Pages\CreateAttachment::route('/create'),
            'edit' => Pages\EditAttachment::route('/{record}/edit'),
        ];
    }
}
