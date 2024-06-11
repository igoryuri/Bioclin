<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\ProductCategory;
use App\Models\Product;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Mvenghaus\FilamentPluginTranslatableInline\Forms\Components\TranslatableContainer;

class ProductResource extends Resource
{
    use Translatable;

    protected static ?string $model = Product::class;

    protected ?string $maxContentWidth = 'full';
    protected static ?string $navigationLabel = "Produtos";

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationGroup = 'Cadastro Produtos';


    public static function form($form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make([
                       Section::make([
                           Select::make('category_cat_id')
                               ->relationship('categories', 'slug', modifyQueryUsing: fn(Builder $query) => $query->where('step', 4))
                               ->required(),
                           TextInput::make('cod_prod')->required(),
                           TextInput::make('sku_id')->required(),
                       ])->columns(3),
                        Section::make([
                            TranslatableContainer::make(
                                MarkdownEditor::make('info')->default('Descrição'),
                            ),
                        ]),
                        Section::make([
                            TranslatableContainer::make(
                                TextInput::make('name')
                                    ->live()
                                    ->debounce(800)
                                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('../slug', Str::slug($state))),
                            )->onlyMainLocaleRequired(),
                        ]),

                        Fieldset::make('Relacionamentos')->schema([
                            Select::make('lines')
                                ->multiple()
                                ->relationship('lines', 'name'),
                            Select::make('category_cat_id')
                                ->multiple()
                                ->relationship('categories', 'slug'),
                            Select::make('related_products')
                                ->multiple()
                                ->options(Product::all()->pluck('name', 'id'))
                                ->searchable(),
                        ])->columns(1),

                    ])
                        ->grow(),

                    Section::make([
                        Fieldset::make('Valores')->schema([
                            TextInput::make('price_brl')
                                ->numeric()
                                ->inputMode('decimal'),
                            TextInput::make('price_usd'),
                            TextInput::make('weight'),
                            TextInput::make('stock'),
                            TextInput::make('slug')->readOnly(),
                        ])->columns(1),

                        Fieldset::make('Line')->schema([
                            Toggle::make('is_active'),
                            Toggle::make('is_comex'),
                        ]),

                        Fieldset::make('SEO')->schema([
                            TextInput::make('meta_description'),
                        ])->columns(1),

                        Section::make('Imagens')->schema([
                                FileUpload::make('images')
                                    ->directory('products')
                                    ->preserveFilenames()
                                    ->multiple()
                                    ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->reorderable()
                                    ->maxFiles(4),
                        ])->collapsed(false)
                    ])
                        ->grow(false)
                ])
                ->from('md')
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable()->searchable(),
//                Tables\Columns\TextColumn::make('categories.slug')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('cod_prod')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('sku_id')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('info')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('slug')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('category_cat_id')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('price_brl')->sortable()->searchable(),
                Tables\Columns\ImageColumn::make('images')
                    ->stacked()
                    ->limit(3)
                    ->limitedRemainingText(isSeparate: true),
                Tables\Columns\TextColumn::make('price_usd')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('weight')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('stock')->sortable()->searchable(),
                Tables\Columns\CheckboxColumn::make('is_active')->sortable()->searchable(),
                Tables\Columns\CheckboxColumn::make('is_comex')->sortable()->searchable(),
            ])->persistFiltersInSession()
            ->striped()
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->paginated([10, 25, 50, 75, 100]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\AttachmentsRelationManager::class,
            RelationManagers\DescriptionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
