<?php

namespace App\Filament\Resources\RedirectionResource\Pages;

use App\Filament\Resources\RedirectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRedirection extends EditRecord
{
    protected static string $resource = RedirectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
