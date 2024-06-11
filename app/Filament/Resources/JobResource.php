<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobResource\Pages;
use App\Filament\Resources\JobResource\RelationManagers;
use App\Models\Job;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use TangoDevIt\FilamentEmojiPicker\EmojiPickerAction;

class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    protected ?string $maxContentWidth = 'full';
    protected static ?string $navigationLabel = "Vagas";

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Split::make([
                    Forms\Components\Section::make([
                        Forms\Components\TextInput::make('title'),
                        Forms\Components\MarkdownEditor::make('description')
                        ->hintAction(EmojiPickerAction::make('emoji-description')),
                    ])->grow(),
                    Forms\Components\Section::make([
                       Forms\Components\Fieldset::make('Ativar/Desativar')->schema([
                           Forms\Components\Toggle::make('is_active')
                       ]),
                        Forms\Components\Fieldset::make('Imagem')->schema([
                            FileUpload::make('image')
                                ->directory('jobs')
                                ->preserveFilenames(),
                        ])->columns(1)
                    ])->grow(false)
                ])->from('md')

            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('description')->limit(50),
                Tables\Columns\CheckboxColumn::make('is_active')
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
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJob::route('/create'),
            'edit' => Pages\EditJob::route('/{record}/edit'),
        ];
    }
}
