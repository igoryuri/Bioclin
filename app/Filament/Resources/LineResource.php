<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LineResource\Pages;
use App\Filament\Resources\LineResource\RelationManagers;
use App\Models\Line;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Mvenghaus\FilamentPluginTranslatableInline\Forms\Components\TranslatableContainer;

class LineResource extends Resource
{
    protected static ?string $model = Line::class;

    protected static ?string $navigationIcon = 'heroicon-o-minus';

    protected static ?string $navigationLabel = "Linhas";

    protected static ?string $navigationGroup = 'Cadastro Produtos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TranslatableContainer::make(
                    TextInput::make('name')
//                    ->live(debounce: 700)
//                    ->debounce(700),
//                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                ),
                TextInput::make('slug'),
                ColorPicker::make('color'),
                TextInput::make('category_id'),
                FileUpload::make('image')
                    ->directory('lines')
                    ->preserveFilenames(),
                FileUpload::make('logo')
                    ->directory('lines\/logo')
                    ->preserveFilenames(),
                TranslatableContainer::make(
                    RichEditor::make('description')
                        ->columnSpan(2),
                ),
                Toggle::make('is_active'),
                Toggle::make('is_comex'),
                Forms\Components\Section::make('Products')->schema([
                    Forms\Components\Select::make('products')
                        ->multiple()
                        ->relationship('products', 'name'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                ColorColumn::make('color'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\CheckboxColumn::make('is_active'),
                Tables\Columns\CheckboxColumn::make('is_comex'),
                Tables\Columns\ImageColumn::make('image')
                    ->circular(),
                Tables\Columns\ImageColumn::make('logo')
                    ->circular(),
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
            RelationManagers\ProductsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLines::route('/'),
            'create' => Pages\CreateLine::route('/create'),
            'edit' => Pages\EditLine::route('/{record}/edit'),
        ];
    }
}
