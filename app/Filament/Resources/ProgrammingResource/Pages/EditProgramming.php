<?php

namespace App\Filament\Resources\ProgrammingResource\Pages;

use App\Filament\Resources\ProgrammingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProgramming extends EditRecord
{
    protected static string $resource = ProgrammingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
