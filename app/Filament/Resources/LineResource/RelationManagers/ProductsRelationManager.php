<?php

namespace App\Filament\Resources\LineResource\RelationManagers;

use App\Models\ProductCategory;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('category_cat_id')
                    ->options(ProductCategory::all()->pluck('slug', 'id')),
                Select::make('type_product_id')
                    ->label('Tipo')
                    ->relationship('type_product', 'name'),
                TextInput::make('cod_prod'),
                TextInput::make('sku_id'),
                TextInput::make('name')
                    ->live(debounce: 700)
                    ->debounce(700)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('name_en'),
                TextInput::make('name_es'),
                TextInput::make('price_brl')
                    ->numeric()
                    ->inputMode('decimal'),
                TextInput::make('price_usd'),
                TextInput::make('weight'),
                TextInput::make('stock'),
                TextInput::make('slug'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\AttachAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
