<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificateResource\Pages;
use App\Filament\Resources\CertificateResource\RelationManagers;
use App\Models\Certificate;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mvenghaus\FilamentPluginTranslatableInline\Forms\Components\TranslatableContainer;

class CertificateResource extends Resource
{
    protected static ?string $model = Certificate::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

    protected static ?string $navigationLabel = "Certificados";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([

                    Section::make([
                        Section::make([
                            TranslatableContainer::make(
                                TextInput::make('title')
                            ),
                        ]),
                        Section::make([
                            TranslatableContainer::make(
                                RichEditor::make('description')
                            ),
                        ]),
                    ]),

                    Section::make([
                        Fieldset::make()->schema([
                            DatePicker::make('expiration_date')->columnSpanFull(),
                        ]),

                        Fieldset::make('Uploads')->schema([
                            FileUpload::make('document')
                                ->directory('certificate-document')
                                ->preserveFilenames(),
                            FileUpload::make('logo')
                                ->directory('certificate-logo')
                                ->preserveFilenames(),
                        ])
                        ->columns(1),

                        Fieldset::make()->schema([
                            Toggle::make('is_active'),
                        ])

                    ])
                        ->grow(false)

                ])
                    ->from('md'),

            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                Tables\Columns\CheckboxColumn::make('is_active'),
                Tables\Columns\ImageColumn::make('logo')
                    ->circular(),
                Tables\Columns\ImageColumn::make('document')
                    ->circular(),
                TextColumn::make('expiration_date'),
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
            'index' => Pages\ListCertificates::route('/'),
            'create' => Pages\CreateCertificate::route('/create'),
            'edit' => Pages\EditCertificate::route('/{record}/edit'),
        ];
    }
}
