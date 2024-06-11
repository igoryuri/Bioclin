<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\ProductCategory;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use \Illuminate\Support\Str;
use Filament\Forms\Set;
use Mvenghaus\FilamentPluginTranslatableInline\Forms\Components\TranslatableContainer;

class CategoryResource extends Resource
{
    use Translatable;

    protected static ?string $model = ProductCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Cadastro Produtos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TranslatableContainer::make(
                    TextInput::make('name')
//                        ->live(debounce: 700)
//                        ->debounce(700)
////                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
//                        ->afterStateUpdated(fn(Set $set, Component $component, ?string $state) => $set('slug' . $component->getMeta('pt-br'), Str::slug($state))),
                ),
                TextInput::make('step')
                    ->numeric()
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                ToggleButtons::make('analytical')
                    ->boolean('Sim', 'Não')
                    ->inline(),
                Toggle::make('is_active'),
                Select::make('category_id')
                    ->options(ProductCategory::all()->pluck('slug', 'id')),
                TextInput::make('category_id_sankhya')->nullable(),
                Select::make('product_id')
                    ->multiple()
                    ->relationship('products', 'sku_id')
                    ->preload()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->sortable(),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('step'),
                Tables\Columns\ToggleColumn::make('analytical'),
                Tables\Columns\ToggleColumn::make('is_active'),
                Tables\Columns\TextColumn::make('parentCategory.slug'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('step')
                ->options([
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                ]),

            ])->persistFiltersInSession()
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
            RelationManagers\ProductsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
